penggunaan docker 

docker container rm -f hackaton_container
    docker image rm hackaton_fasta:v24
    docker build --no-cache -t hackaton_fasta:v24 .
    docker run -d -p 8080:80 --name hackaton_container hackaton_fasta:v24

nb : sesuaikan nama container dan port


akses lokal ::

buat php spark create:migration "name_tabel" -> sesuaikan dengan model yang tersedia
buat file migrasi jika ingin mengubah databse()

tidak perlu "php spark serve"  langsung localhost/nama folder ini (begitu juga setelah dihosting)

akses database atau sql
database.default.hostname = hackatonfasta-fastabikulhackaton.b.aivencloud.com
database.default.database = hackaton_fasta
database.default.username = avnadmin
database.default.password = AVNS_k1LAusQxWcMK_iI-Aq4
database.default.DBDriver = Postgre

dapat langsung remote menggunakan navicat atau pgadmin
