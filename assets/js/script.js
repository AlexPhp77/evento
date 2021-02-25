let btnModal = document.querySelectorAll('.menu');
let areaModal = document.querySelector('.modal-area');
let botao = document.querySelector('.botao');

let janela = '';
btnModal.forEach(function (item, indexBtn){
	item.addEventListener('click', ()=>{

		document.querySelector('.efeitoModal'+indexBtn).style.display = 'block';
        janela = document.querySelector('.efeitoModal'+indexBtn);
     	
	});
});

function fecharModal(){
	janela.style.display = 'none';
}

botao.addEventListener('click', ()=>{
	$.ajax({
		type:'POST',				
		url:"organizar_evento.php",
		success:function(){
			
		}
    });
});

botao.addEventListener('click', ()=>{	
	$.ajax({
		type:'POST',				
		url:"organizar_evento_lanche.php",
		success:function(){
			
		}
    });
});