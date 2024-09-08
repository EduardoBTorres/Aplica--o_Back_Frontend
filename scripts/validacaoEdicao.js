function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, ''); // Remove caracteres não numéricos
    if (cpf.length !== 11) return false;
    let soma = 0;
    let resto;
    if (/^(\d)\1{10}$/.test(cpf)) return false; // Verifica CPF com todos os dígitos iguais

    for (let i = 1; i <= 9; i++) soma += parseInt(cpf.charAt(i - 1)) * (11 - i);
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.charAt(9))) return false;

    soma = 0;
    for (let i = 1; i <= 10; i++) soma += parseInt(cpf.charAt(i - 1)) * (12 - i);
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.charAt(10))) return false;

    return true;
}

function validarEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function validarSenha(senha) {
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    return regex.test(senha);
}

function validarImagem(imagem) {
    if (imagem.files.length > 0) {
        const fileSize = imagem.files[0].size / 1024 / 1024; // em MB
        const fileType = imagem.files[0].type;
        const allowedTypes = ['image/jpeg', 'image/png'];

        if (!allowedTypes.includes(fileType)) {
            alert('O arquivo deve ser uma imagem JPEG ou PNG.');
            return false;
        }

        if (fileSize > 2) {
            alert('O tamanho da imagem não deve exceder 2MB.');
            return false;
        }
    }
    return true;
}

function validarFormulario() {
    const cpf = document.getElementById('cpf').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;
    const imagem = document.getElementById('imagem');

    if (!validarCPF(cpf)) {
        alert('CPF inválido.');
        return false;
    }

    if (!validarEmail(email)) {
        alert('Email inválido.');
        return false;
    }

    if (senha && !validarSenha(senha)) {
        alert('A senha deve conter no mínimo 8 caracteres, incluindo letras maiúsculas, minúsculas e números.');
        return false;
    }

    if (!validarImagem(imagem)) {
        return false;
    }

    document.getElementById('mensagem').innerText = 'Perfil alterado com sucesso!';
    return true;
}
