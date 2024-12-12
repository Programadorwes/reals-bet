const inputValor = document.getElementById('valor');
    
// Verificando se o input foi selecionado corretamente
console.log(inputValor);

inputValor.addEventListener('input', function() {
    console.log('Valor sendo digitado:', this.value);

    // Obter o valor atual removendo qualquer caractere que não seja número
    let valueValor = this.value.replace(/[^\d]/g, '');

    // Adicionar os separadores de milhares
    var formattedValor = (valueValor.slice(0, -2).replace(/\B(?=(\d{3})+(?!\d))/g, '.')) + '' + valueValor.slice(-2);

    // Adicionar a vírgula e até dois dígitos se houver centavos
    formattedValor = formattedValor.slice(0, -2) + ',' + formattedValor.slice(-2);

    // Atualizar o valor do campo
    this.value = formattedValor;

    // Verificar no console
    console.log('Valor formatado:', this.value);
});