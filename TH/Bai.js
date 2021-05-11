$(document).ready(function(){
 var cus =new Customers();
 cus.loadData();
 $('#them').hide();
 cus.initEvent();
})
class Customers{
    constructor(){
     
    }

    hello(){
        alert("hello");
    }
       
    initEvent(){
        $('#btnAdd').click(this.btnAddOnClick);
        $('#dong').click(this.btnCancelOnClick);
        $('#xac').click(this.isValid);                                                                                                                                                                                             
    }
    loadData(msg){
        $('table tbody').empty();
        var trHTML=$(`
        <tr>
        <td scope="row">A2</td>
        <td>KHUAT DUC</td>
        <td>@</td>
        <td>123463</td>
        <td>HANOI</td>
        </tr>
        `); 
        $.each(data, function(index,item){
            var trHTML=$(`
            <tr>
            <td scope="row">`+item.id+`</td>
            <td>`+item.name+`</td>                                                            
            <td>`+item.email+`</td>
            <td>`+item.address+`</td>
            </tr>
            `); 
            $('table tbody').append(trHTML);  
        })                                              
                                       
    }

    btnAddOnClick(){
        $('#them').show();
    }

    btnCancelOnClick(){
        $('#them').hide();
    }


    isValid(){
        var customer={};
        customer.id=$('#inputId').val();
        customer.name=$('#inputName').val();
        customer.email=$('#inputEmail').val();
        customer.phone=$('#inputPhone').val();
        customer.address=$('#inputAddress').val();
        data.push(customer);
        this.hello();
     
    }

    add(){

    }

    edit(){

    }

    delete(){

    }

}


var data=[
    {
        id:"001",
        name:"khuat duc",
        email:"duc@gmail.com",
        phone:"0123456789",
        adress:"ha noi"
    },
    {
        id:"001",
        name:"khuat duc",
        email:"duc@gmail.com",
        phone:"0123456789",
        adress:"ha noi"
    },
    
    {
        id:"001",
        name:"khuat duc",
        email:"duc@gmail.com",
        phone:"0123456789",
        adress:"ha noi"
    }
]