<div class="card shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body d-flex align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0">Kompress Image</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="<?= base_url('/') ?>">Kompress</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Images</li>
            </ol>
        </nav>
    </div>
</div>



<div class="card w-100 position-relative overflow-hidden">
    <div class="px-4 py-3 border-bottom"></div>

    <style>
        .drop-zone {
            border: 2px dashed #ccc;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .drop-zone.dragover {
            background-color: #e9ecef;
        }

        .drop-zone img {
            max-width: 100%;
            margin-top: 15px;
        }
    </style>

    <div class="container py-5">
        <h2 class="mb-4 text-center">Upload Gambar (Drag & Drop)</h2>

        <div class="drop-zone" id="dropZone">
            <p>Tarik dan lepaskan gambar di sini atau klik untuk memilih</p>
            <input type="file" id="fileInput" accept="image/*" hidden>
        </div>

        <div class="row mt-5">

            <div class="col-md-6 text-center">
                <h5>Gambar Asli</h5>
                <div id="originalPreview"></div>
                <p id="originalInfo" class="text-muted"></p>
            </div>


            <div class="col-md-6 text-center">
                <h5>Gambar Terkompres</h5>
                <div id="compressedPreview"></div>
                <p id="compressedInfo" class="text-muted"></p>
            </div>
        </div>

        <center>
            <form action="<?php echo base_url('submit/kompress') ?>" method="POST" enctype="multipart/form-data" id="uploadForm">

                <input type="file" name="original_image" id="originalInput" accept="image/*" hidden>
                <input type="hidden" name="original_name" id="originalName">
                <input type="hidden" name="original_size" id="originalSize">

                <input type="hidden" name="compressed_name" id="compressedName">
                <input type="hidden" name="compressed_size" id="compressedSize">
                <input type="file" name="compressed_file" id="compressedData">

                <button type="submit" class="btn btn-primary mt-4">Simpan ke Database</button>
            </form>
        </center>


    </div>

    <script>
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('fileInput');
        const originalPreview = document.getElementById('originalPreview');
        const compressedPreview = document.getElementById('compressedPreview');
        const originalInfo = document.getElementById('originalInfo');
        const compressedInfo = document.getElementById('compressedInfo');


        const originalNameInput = document.getElementById('originalName');
        const originalSizeInput = document.getElementById('originalSize');
        const compressedNameInput = document.getElementById('compressedName');
        const compressedSizeInput = document.getElementById('compressedSize');
        const compressedDataInput = document.getElementById('compressedData');
        const originalFileInput = document.getElementById('originalInput');

        dropZone.addEventListener('click', () => fileInput.click());

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('dragover');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('dragover');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('dragover');
            if (e.dataTransfer.files.length) {
                handleFiles(e.dataTransfer.files);
            }
        });

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length) {
                handleFiles(fileInput.files);
            }
        });

        function formatBytes(bytes) {
            if (bytes < 1024) return bytes + ' B';
            else if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB';
            else return (bytes / 1048576).toFixed(1) + ' MB';
        }

        function handleFiles(files) {
            const file = files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = () => {
                    const dataURL = reader.result;

                    
                    originalPreview.innerHTML = `<img src="${dataURL}" class="img-fluid rounded" />`;
                    originalInfo.textContent = `Nama: ${file.name}, Ukuran: ${formatBytes(file.size)}`;

                   
                    originalNameInput.value = file.name;
                    originalSizeInput.value = file.size;

                    
                    const dt = new DataTransfer();
                    dt.items.add(file);
                    originalFileInput.files = dt.files;

                    
                    compressImage(dataURL, file.name);
                };
                reader.readAsDataURL(file);
            } else {
                originalPreview.innerHTML = '';
                originalInfo.textContent = 'File bukan gambar!';
                compressedPreview.innerHTML = '';
                compressedInfo.textContent = '';
            }
        }

        function compressImage(dataUrl, originalName) {
            const img = new Image();
            img.src = dataUrl;
            img.onload = () => {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
                const maxWidth = 800;
                const scale = maxWidth / img.width;
                canvas.width = maxWidth;
                canvas.height = img.height * scale;

                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                
                canvas.toBlob((blob) => {
                    const compressedUrl = URL.createObjectURL(blob);
                    compressedPreview.innerHTML = `<img src="${compressedUrl}" class="img-fluid rounded" />`;
                    compressedInfo.textContent = `Nama: compressed_${originalName}, Ukuran: ${formatBytes(blob.size)}`;

                  
                    const reader = new FileReader();
                    reader.onloadend = () => {
                        compressedDataInput.value = reader.result;
                        compressedNameInput.value = "compressed_" + originalName;
                        compressedSizeInput.value = blob.size;
                    };
                    reader.readAsDataURL(blob);
                }, 'image/jpeg', 0.6);
            };
        }
    </script>

</div>
