// chargement departement
$(document).ready(function()
{
$(".region").change(function()
{
var country_id=$(this).val();
var post_id = 'id='+ country_id;

$.ajax
({
type: "POST",
url: "controller/departementController.php",
data: post_id,
cache: false,
success: function(cities)
{
$(".dep").html(cities);
} 
});

});
});

// chargement Arrondissement
$(document).ready(function()
{
$(".dep").change(function()
{
var country_id=$(this).val();
var post_id = 'id='+ country_id;

$.ajax
({
type: "POST",
url: "controller/arrondissementController.php",
data: post_id,
cache: false,
success: function(cities)
{
$(".arron").html(cities);
} 
});

});
});


// chargement commune
$(document).ready(function()
{
$(".arron").change(function()
{
var country_id=$(this).val();
var post_id = 'id='+ country_id;

$.ajax
({
type: "POST",
url: "controller/communeController.php",
data: post_id,
cache: false,
success: function(cities)
{
$(".commune").html(cities);
} 
});

});
});

// chargement bureau
$(document).ready(function()
{
$(".commune").change(function()
{
var country_id=$(this).val();
var post_id = 'id='+ country_id;

$.ajax
({
type: "POST",
url: "controller/bureauController.php",
data: post_id,
cache: false,
success: function(cities)
{
$(".bureau").html(cities);
} 
});

});
});





 



