<main>
    <?= $this->parameters['error'] ?? '' ?>
    <br><br>
    <label>Nome: <?= $name ?? '' ?></label>
    <br>
    <label>Sobrenome: <?= $lastName ?? '' ?></label>
    <br>
    <label>Idade: <?= $age ?? '' ?></label>
    <br>
    <a href="/">Início</a>
</main>