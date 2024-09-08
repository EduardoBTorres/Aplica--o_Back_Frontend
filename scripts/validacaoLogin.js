function validarLogin() {
    const email = document.getElementById('email').value.trim();
    const senha = document.getElementById('senha').value.trim();
    const mensagemErro = document.getElementById('mensagemErro');

    mensagemErro.textContent = ''; // Limpar mensagens de erro anteriores

    // Validação de campos vazios
    if (email === '' || senha === '') {
        mensagemErro.textContent = 'Por favor, preencha ambos os campos de email e senha.';
        return false; // Impede o envio do formulário
    }

    // Validação do formato do email
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regexEmail.test(email)) {
        mensagemErro.textContent = 'Por favor, insira um email válido.';
        return false; // Impede o envio do formulário
    }

    // Se tudo estiver correto, permitir o envio do formulário
    return true;
}
