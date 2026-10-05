document.addEventListener("DOMContentLoaded", function () {
    const estoque = document.getElementById("qntdEstoque");

    if (estoque) {
        estoque.addEventListener("input", function () {
            this.value = this.value.replace(/\D/g, "");
        });
    }

    const valor = document.getElementById("valor");

    if (valor) {
        valor.addEventListener("input", function () {
            this.value = this.value.replace(/[^0-9,.]/g, "");
        });
    }

    function somenteNumeros(valor) {
        return valor.replace(/\D/g, "");
    }

    function limparCaracteres(input, regex, limite = null) {
        input.value = input.value.replace(regex, "");
        if (limite !== null) {
            input.value = input.value.slice(0, limite);
        }
    }

    function mascaraCPF(input) {
        let v = somenteNumeros(input.value).slice(0, 11);
        if (v.length > 9) v = v.replace(/(\d{3})(\d{3})(\d{3})(\d{1,2})/, "$1.$2.$3-$4");
        else if (v.length > 6) v = v.replace(/(\d{3})(\d{3})(\d{1,3})/, "$1.$2.$3");
        else if (v.length > 3) v = v.replace(/(\d{3})(\d{1,3})/, "$1.$2");
        input.value = v;
    }

    function mascaraCEP(input) {
        let v = somenteNumeros(input.value).slice(0, 8);
        if (v.length > 5) v = v.replace(/(\d{5})(\d{1,3})/, "$1-$2");
        input.value = v;
    }

    function mascaraTelefone(input) {
        let v = somenteNumeros(input.value).slice(0, 11);
        if (v.length > 10) v = v.replace(/(\d{2})(\d{5})(\d{1,4})/, "($1) $2-$3");
        else if (v.length > 6) v = v.replace(/(\d{2})(\d{4})(\d{1,4})/, "($1) $2-$3");
        else if (v.length > 2) v = v.replace(/(\d{2})(\d{1,5})/, "($1) $2");
        input.value = v;
    }

    function validarCPFFront(valor) {
        const cpf = somenteNumeros(valor);
        if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) return false;

        let soma = 0;
        for (let i = 0; i < 9; i++) soma += Number(cpf[i]) * (10 - i);
        let resto = (soma * 10) % 11;
        if (resto === 10) resto = 0;
        if (resto !== Number(cpf[9])) return false;

        soma = 0;
        for (let i = 0; i < 10; i++) soma += Number(cpf[i]) * (11 - i);
        resto = (soma * 10) % 11;
        if (resto === 10) resto = 0;
        return resto === Number(cpf[10]);
    }

    // NOME: somente letras, acentos, espaços, hífen e apóstrofo.
    document.querySelectorAll('input[name="nome"]').forEach(input => {
        input.addEventListener("input", function () {
            limparCaracteres(this, /[^A-Za-zÀ-ÿ\s'-]/g, 100);
            this.setCustomValidity("");
        });
        input.addEventListener("blur", function () {
            const valor = this.value.trim();
            if (valor && !/^[A-Za-zÀ-ÿ\s'-]+$/.test(valor)) {
                this.setCustomValidity("O nome deve conter apenas letras, espaços, hífen e apóstrofo.");
            } else if (valor && valor.length < 3) {
                this.setCustomValidity("O nome deve possuir pelo menos 3 caracteres.");
            } else {
                this.setCustomValidity("");
            }
        });
    });

    document.querySelectorAll('input[name="cpf"]').forEach(input => {
        input.addEventListener("input", () => mascaraCPF(input));
        input.addEventListener("blur", function () {
            this.setCustomValidity(!this.value || validarCPFFront(this.value) ? "" : "Digite um CPF válido.");
        });
    });

    document.querySelectorAll('input[name="cep"]').forEach(input => {
        input.addEventListener("input", () => mascaraCEP(input));
        input.addEventListener("blur", function () {
            const vazio = !this.value.trim();
            const valido = somenteNumeros(this.value).length === 8;
            this.setCustomValidity(vazio || valido ? "" : "Digite um CEP válido no formato 00000-000.");
        });
    });

    document.querySelectorAll('input[name="telefone"]').forEach(input => {
        input.addEventListener("input", () => mascaraTelefone(input));
        input.addEventListener("blur", function () {
            const numeros = somenteNumeros(this.value);
            const valido = numeros.length === 10 || numeros.length === 11;
            this.setCustomValidity(!this.value.trim() || valido ? "" : "Digite um telefone válido.");
        });
    });

    document.querySelectorAll('input[name="estado"]').forEach(input => {
        input.addEventListener("input", function () {
            this.value = this.value.replace(/[^A-Za-zÀ-ÿ]/g, "").slice(0, 2).toUpperCase();
        });
        input.addEventListener("blur", function () {
            this.setCustomValidity(!this.value || /^[A-Z]{2}$/.test(this.value) ? "" : "Digite a UF com 2 letras.");
        });
    });

    // Número do endereço: números, letras, espaço, barra e hífen.
    document.querySelectorAll('input[name="numero"]').forEach(input => {
        input.addEventListener("input", function () {
            limparCaracteres(this, /[^0-9A-Za-zÀ-ÿ\s\/-]/g, 10);
        });
    });

    // Bairro: permite letras, acentos, números, espaços, hífen e apóstrofo.
    document.querySelectorAll('input[name="bairro"]').forEach(input => {
        input.addEventListener("input", function () {
            limparCaracteres(this, /[^A-Za-zÀ-ÿ0-9\s'-]/g, 100);
        });
    });

    // Cidade: permite letras, acentos, espaços, hífen e apóstrofo.
    document.querySelectorAll('input[name="cidade"]').forEach(input => {
        input.addEventListener("input", function () {
            limparCaracteres(this, /[^A-Za-zÀ-ÿ\s'-]/g, 100);
        });
    });

    // Logradouro: permite números porque endereços podem conter nomes como "Rua 7 de Setembro".
    document.querySelectorAll('input[name="logradouro"]').forEach(input => {
        input.addEventListener("input", function () {
            limparCaracteres(this, /[^A-Za-zÀ-ÿ0-9\s'.,ºª\/-]/g, 45);
        });
    });

    // Complemento: permite texto e números.
    document.querySelectorAll('input[name="complemento"]').forEach(input => {
        input.addEventListener("input", function () {
            limparCaracteres(this, /[^A-Za-zÀ-ÿ0-9\s'.,ºª\/-]/g, 100);
        });
    });

    // Produto: modelo pode conter números (ex.: Ryzen 5 5600GT).
    document.querySelectorAll('input[name="modelo"]').forEach(input => {
        input.addEventListener("input", function () {
            this.value = this.value.slice(0, 100);
        });
    });

    document.querySelectorAll('input[name="marca"]').forEach(input => {
        input.addEventListener("input", function () {
            limparCaracteres(this, /[^A-Za-zÀ-ÿ0-9\s&.'-]/g, 50);
        });
    });

    document.querySelectorAll('input[name="valor"]').forEach(input => {
        input.addEventListener("input", function () {
            if (Number(this.value) < 0) this.value = "";
        });
    });

    document.querySelectorAll('input[name="qntdEstoque"]').forEach(input => {
        input.addEventListener("input", function () {
            this.value = this.value.replace(/\D/g, "");
        });
    });

    document.querySelectorAll('input[type="file"][name="imagem"]').forEach(input => {
        input.addEventListener("change", function () {
            const arquivo = this.files[0];
            if (!arquivo) return;
            const tipos = ["image/jpeg", "image/png", "image/webp"];
            if (!tipos.includes(arquivo.type) || arquivo.size > 5 * 1024 * 1024) {
                this.setCustomValidity("Selecione uma imagem JPG, PNG ou WEBP de até 5 MB.");
            } else {
                this.setCustomValidity("");
            }
        });
    });

    document.querySelectorAll("form").forEach(form => {
        form.addEventListener("submit", function (event) {
            const nome = form.querySelector('input[name="nome"]');
            if (nome && nome.value.trim() !== "") {
                const valor = nome.value.trim();
                nome.setCustomValidity(/^[A-Za-zÀ-ÿ\s'-]+$/.test(valor) && valor.length >= 3 ? "" : "Nome inválido.");
            }

            const cep = form.querySelector('input[name="cep"]');
            if (cep && cep.value.trim() !== "") cep.setCustomValidity(somenteNumeros(cep.value).length === 8 ? "" : "CEP inválido.");

            const tel = form.querySelector('input[name="telefone"]');
            if (tel && tel.value.trim() !== "") {
                const n = somenteNumeros(tel.value).length;
                tel.setCustomValidity(n === 10 || n === 11 ? "" : "Telefone inválido.");
            }

            const uf = form.querySelector('input[name="estado"]');
            if (uf && uf.value.trim() !== "") uf.setCustomValidity(/^[A-Z]{2}$/.test(uf.value.trim()) ? "" : "UF inválida.");

            const senha = form.querySelector('input[name="senha"]');
            if (senha && senha.value.length > 0) senha.setCustomValidity(senha.value.length >= 6 ? "" : "A senha deve possuir pelo menos 6 caracteres.");

            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add("was-validated");
        });
    });
});
