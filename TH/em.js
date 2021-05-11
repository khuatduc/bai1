$(document).ready(function(){
     var em=new Employee();
   })

   class Employee{
    constructor(){
       this.loadData();
    }
       
    loadData(msg){
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
            <td>`+item.id+`</td>
            <td>`+item.name+`</td>
            <td>`+item.eamil+`</td>
            <td>`+item.address+`</td>
            </tr>
            `); 
            $('table tbody').append(trHTML);  
        })
    
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
           id:"002",
           name:"khuat duc",
           email:"duc@gmail.com",
           phone:"0123456789",
           adress:"ha noi"
       },
       
       {
           id:"003",
           name:"khuat duc",
           email:"duc@gmail.com",
           phone:"0123456789",
           adress:"ha noi"
       }
   ]