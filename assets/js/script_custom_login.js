$(document).ready(function() {
    $('.ui.form')
    .form({
        fields: {
            email: {
            identifier  : 'usuario',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Por favor entre com seu nome de usuário'
                    }
                ]
            },
            password: {
            identifier  : 'password',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Por favor entre com sua senha'
                    },
                    {
                        type   : 'length[6]',
                        prompt : 'Sua senha precisa conter mais de 6 caracteres'
                    }
                ]
            }
        }
    });
});