$(document).ready(function() {
    $('.ui.form')
    .form({
        fields: {
            email: {
            identifier  : 'email',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Por favor entre com seu e-mail'
                    },
                    {
                        type   : 'email',
                        prompt : 'Por favor entre com um e-mail válido'
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