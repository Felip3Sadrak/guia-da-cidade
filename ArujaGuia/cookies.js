// Função para definir um cookie
function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// Função para obter um cookie
function getCookie(name) {
    const nameEQ = name + "=";
    const ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Função para verificar se o cookie de aceitação de privacidade existe
function checkPrivacyCookie() {
    const privacyAccepted = getCookie("privacyAccepted");
    if (!privacyAccepted) {
        // Exibir o modal de políticas de privacidade
        $('#privacyPolicyModal').modal('show');
    }
}

// Função para aceitar a política de privacidade
function acceptPrivacyPolicy() {
    setCookie("privacyAccepted", "true", 30); // 30 dias
    $('#privacyPolicyModal').modal('hide');
}

// Função para salvar os dados do usuário após login
function saveUserSession(userId) {
    setCookie("userId", userId, 30); // 30 dias
}

// Função para verificar a sessão do usuário
function checkUserSession() {
    const userId = getCookie("userId");
    if (userId) {
        // O usuário já está logado, faça o que precisar aqui
        console.log("Usuário logado com ID: " + userId);
    } else {
        console.log("Usuário não está logado.");
    }
}

// Chama a função para verificar a aceitação da política de privacidade ao carregar a página
$(document).ready(function () {
    checkPrivacyCookie();
    checkUserSession();
});

// Ação do botão "Concordar" no modal
$('#agreeBtn').click(function () {
    acceptPrivacyPolicy();
    alert("Você concordou com as políticas de privacidade.");
});
