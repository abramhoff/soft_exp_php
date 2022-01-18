$(".add-produto").click(function () {

  let val_imposto = $(this).data('valor') * $(this).data('imposto') / 100;
      val_imposto_ft = val_imposto.toLocaleString('pt-br', {minimumFractionDigits: 2,maximumFractionDigits: 2});
  let valor_ft = $(this).data('valor').toLocaleString('pt-br', {minimumFractionDigits: 2,maximumFractionDigits: 2});
  let row = `
  <tr class="row-produto" id="prod_${$(this).data('codigo')}" data-valor="${$(this).data('valor')}" data-imposto="${$(this).data('imposto')}" >
  <td>${$(this).data('codigo')}</td>
  <td>${$(this).data('produto')}</td>  
  <td>
  <input type="number"  width="20" class="form-control form-control-sm input-qtd" name="quantidade[]" value="1"  placeholder="" required>
  <input type="hidden"  value="${$(this).data('codigo')}" name="codigo_produto[]" >
  </td>
  <td><span>R$</span><div class="valor"  data-valor="${$(this).data('valor')}" >${valor_ft}</div></td>
  <td><span>R$</span><div class="valor_imposto"  data-valor="${val_imposto}" >${val_imposto_ft}</div></td>
  <td><button  type="button" class="remover-prod btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button></td>
  </tr>`;

  if($('#prod_'+$(this).data('codigo')).length == 0){
    $('#form-venda table tbody').append(row);
  }
  totais();
});

$(document).on('click', '.remover-prod', function () {
  $(this).closest('.row-produto').remove();
  totais();
});

$(document).on('change', '.input-qtd', function () {
  if(this.value < 1){
    this.value = 1;
    return false;
  } 
  let element = $(this).closest('.row-produto');

  let novo_subtotal = this.value * element.data('valor');
  let novo_subtotal_imposto = (this.value * element.data('valor')) * element.data('imposto') / 100;


  let novo_subtotal_ft = novo_subtotal.toLocaleString('pt-br', {minimumFractionDigits: 2,maximumFractionDigits: 2});
  let novo_subtotal_imposto_ft = novo_subtotal_imposto.toLocaleString('pt-br', {minimumFractionDigits: 2,maximumFractionDigits: 2});

  element.find( "div.valor" ).text(novo_subtotal_ft);
  element.find( "div.valor_imposto" ).text(novo_subtotal_imposto_ft);

  element.find( "div.valor" ).attr('data-valor', novo_subtotal);
  element.find( "div.valor_imposto" ).attr('data-valor', novo_subtotal_imposto);
  totais();
});

function totais(){
  $('.row-produto').length > 0  ? $('.submit-venda').removeAttr('disabled') : $('.submit-venda').attr('disabled',true) ; 
  $('.row-produto').length > 0  ? $('.totais').show(): $('.totais').hide() ; 
  
  var total_valor = 0;
  var total_imposto = 0 ;
  $('.row-produto').each(function( index ) {
    total_valor = Number($( this ).find('.valor').attr('data-valor')) + total_valor;
    total_imposto = Number($( this ).find('.valor_imposto').attr('data-valor')) + total_imposto;
   });


   $('.ft-total').text('R$'+formatMoney(total_valor));
   $('.ft-total-imposto').text('R$'+formatMoney(total_imposto));
   $('.ft-total-geral').text('R$'+formatMoney(total_imposto + total_valor));
}

function formatMoney(val){
 return val.toLocaleString('pt-br', {minimumFractionDigits: 2,maximumFractionDigits: 2});
}