// function pageload()
// {

    
//     var pageRefresh = setInterval("AutoRefresh()",5000);
    

// }

function AutoRefresh( ) 
{
$.getJSON('endorsements.json?' + new Date().getTime(), function(data) {
    	$.ajaxSetup({ cache:false });
    	$.ajax({
	cache: false,
	url: "endorsements.json",
	success: function(result)
                    {
                        localStorage.setItem('endorse', JSON.stringify(result));
                    }});
  
});
  	display_endorsements();

}
setInterval("AutoRefresh()",5000);




function display_endorsements()
{

    var endorsements = JSON.parse(localStorage.endorse);
    
    endorsements = sortByKey(endorsements, localStorage.sort_method );
    
    document.getElementById("endo_table").innerHTML = "";
    for (var i = 0, len = endorsements.length; i < len; i++)
        {
            var endorsed = endorsements[i];
            endo_table.innerHTML += 
            ` 
            <tr>
            <td>${endorsed.name}</td>
            <td>${endorsed.date}</td>
            <td>${endorsed.comment}</td>
            </tr>
            `            
        }
}

function display_typed_text()
{
    document.getElementById('name').value = localStorage.typed_n;
    document.getElementById('date').value = localStorage.typed_d;
    document.getElementById('comment').value = localStorage.typed_c;
}


document.getElementById('modal-btn-si').addEventListener('click', function()
{
    //Check if the local stoarage has been initialized or not
    if(localStorage.endorse == undefined)
        {
            var endorse = []; // if not, initialize it
        }
    else
    {
        var endorse = JSON.parse(localStorage.endorse); //bring out the object (which is an array of objects) out and name it endorse
    }
            
    //create the new object composed of the name and date
    var newendorsement = 
    {
        name: document.getElementById('name').value,
        date: document.getElementById('date').value,
        comment: document.getElementById('comment').value
    }
    endorse.push(newendorsement);
    localStorage.endorse = JSON.stringify(endorse);
    display_endorsements();
}
)

document.getElementById('sort_date').addEventListener('click', function()
{
    localStorage.sort_method = 'date';
    display_endorsements();
})
document.getElementById('sort_name').addEventListener('click', function()
{
    localStorage.sort_method = 'name';
    display_endorsements();
})

document.getElementById('name').addEventListener("keyup", function()
{
    localStorage.typed_n = document.getElementById('name').value;
})

document.getElementById('date').addEventListener("change", function()
{
    localStorage.typed_d = document.getElementById('date').value;
})

document.getElementById('comment').addEventListener("change", function()
{
    localStorage.typed_c = document.getElementById('comment').value;
})

function sortByKey(array, key)
{

return array.sort(function(a,b)
    {
    var x = a[key];
    var y = b[key];
    return ((x<y) ?-1:((x>y)?1:0));
    }
                 );

}

var modalConfirm = function(callback){
  
  $("#submit").on("click", function(){
    $("#mi-modal").modal('show');
  });

  $("#modal-btn-si").on("click", function(){
    callback(true);
    $("#mi-modal").modal('hide');
  });
  
  $("#modal-btn-no").on("click", function(){
    callback(false);
    $("#mi-modal").modal('hide');
  });
};

modalConfirm(function(confirm){
  if(confirm){
    //Acciones si el usuario confirma
    $("#result").html("Confirmed");
  }else{
    //Acciones si el usuario no confirma
    $("#result").html("Unconfirmed");
  }
});


display_endorsements();
display_typed_text();


