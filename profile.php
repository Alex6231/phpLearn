<div class="container">
    <p>Имя: <span id="name"></span></p>
    <p>Фамиля: <span id="lastname"></span></p>
    <p>Email: <span id="email"></span></p>
    <p>ID: <span id="id"></span></p>
</div>
<script>
    const name = document.getElementById('name');
    const lastname = document.getElementById('lastname');
    const email = document.getElementById('email');
    const id = document.getElementById('id');
    fetch('/php/getUserData.php')
        .then(function (response){return response.json()})
        .then(function (result){
            name.innerText = result.name;
            lastname.innerText = result.lastname;
            email.innerText = result.email;
            id.innerText = result.id;
        });
</script>