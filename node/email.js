const nodemailer = require('nodemailer');

async function enviarEmail(destinatario, assunto, mensagem) {
    let transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: 'seuemail@gmail.com',
            pass: 'suasenha'
        }
    });

    let info = await transporter.sendMail({
        from: '"Site Emprego" <seuemail@gmail.com>',
        to: destinatario,
        subject: assunto,
        text: mensagem
    });

    console.log('Email enviado: %s', info.messageId);
}

module.exports = enviarEmail;
