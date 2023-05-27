<!DOCTYPE html>
<html>
<head>
    <title>Validar Rota</title>
</head>
<body>
    <label>Informe a rota:</label>
    <input type="text" id="rota" placeholder="Exemplo: RS,SC,PR">
    <button id="validar-rota-btn">Validar</button>
    <div id="resultado"></div>
</body>
</html>

<script>
    async function validarRota() {
        try {
            const rota = document.getElementById('rota').value;
            const url = `/api/trajeto/validar?rota=${encodeURIComponent(rota)}`;

            const response = await fetch(url);
            const data = await response.json();

            if (data.codigo === 400) {
                throw new Error(`Erro: ${data.codigo} | Mensagem: ${data.mensagem}`);
            }

            const resultado = document.getElementById('resultado');
            resultado.textContent = `Rota: ${data.rota} | Válida: ${data.isValida}`;
        } catch (error) {
            const resultado = document.getElementById('resultado');
            resultado.textContent = `${error.message}`;
        }
    }

    document.getElementById('validar-rota-btn').addEventListener('click', validarRota);
</script>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    input[type="text"] {
        padding: 5px;
    }

    button {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    #resultado {
        margin-top: 20px;
    }
</style>