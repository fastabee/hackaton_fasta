<?php echo @$fasta; ?>

<html>
<p>
    docker container rm -f hackaton_container
    docker image rm hackaton_fasta:v24
    docker build --no-cache -t hackaton_fasta:v24 .
    docker run -d -p 8080:80 --name hackaton_container hackaton_fasta:v24

</p>

</html>