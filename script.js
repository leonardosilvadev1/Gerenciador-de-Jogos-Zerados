const botaoAbrir = document.getElementById('adicionar');
const modal = document.getElementById('form_modal');
const formulario = document.getElementById('meuFormulario');

//Abrir o modal
botaoAbrir.addEventListener('click', () => {
    modal.showModal();
});

//Evitar que a página recarregue ao salvar para você ver o resultado no console
formulario.addEventListener('submit', (event) => {
    event.preventDefault(); 
            
    console.log("Formulário enviado com sucesso!");
    alert("Jogo salvo com sucesso!");
            
    modal.close();
    formulario.reset();
});