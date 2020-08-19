if(document.readyState == 'loading'){
	document.eventlistener('DOMContentLoaded', ready)
} else {
	ready()
}

function ready()
{
	var addToCartButtons = document.getElementsByClassName('btn btn-success') //za vse add to cart gumbe
	for (var i = 0; i < addToCartButtons.length; i++) {  //for loop skozi vse gumbe
		var button = addToCartButtons[i]  	//za vsak gumb v arrayu[]
		button.addEventListener('click', addToCartClicked)  //ob KLIKU se izvede funkcija
		updateCartTotal() //POSODOBITEV KOŠARICE
	}

	var removeCartItemButtons = document.getElementsByClassName('btn btn-danger') //za vse remove from cart gumbe
	//console.log(removeCartItemButtons)
	for (var i = 0; i < removeCartItemButtons.length; i++) {   //for loop skozi vse gumbe
		var button = removeCartItemButtons[i]	//za vsak gumb v arrayu[]
		button.addEventListener('click', removeItemFromCart)   //ob KLIKU se izvede funkcija 
		updateCartTotal() //POSODOBITEV KOŠARICE
	}

	var quantityInputs = document.getElementsByClassName('item-quantity') //Quantity input (V KOŠARICI)
	// console.log(quantityInputs)
	for (var i = 0; i < quantityInputs.length; i++) { 
		var input = quantityInputs[i] 
		input.addEventListener('change', quantityChanged)  //ob SPREMEMBI se sproži funkcija
	}
}


function removeItemFromCart(event){  //ODSTRANIMO IZDELEK
	var buttonClicked = event.target     //target - kateri gump je sprožil EventListener
	buttonClicked.parentElement.parentElement.remove() //Komponenta, od katere je gump, odstranimo iz košarice
	updateCartTotal()  
}

function quantityChanged(event){
	var input = event.target  	//Kateri input je bil spremenjen
	if(isNaN(input.value) || input.value <= 0) {   //isNaN - is not a number ali <=0  === 1
		input.value = 1
	}
	updateCartTotal() 
}


function updateCartTotal(){  
	var cartItemContainer = document.getElementsByClassName('cart-items')[0]  //Košarica kontainer
	var cartRows = cartItemContainer.getElementsByClassName('cart-row') //Vrstice v košarici (Izdelki)
	var total = 0
	for (var i = 0; i < cartRows.length; i++) { //Loop čez vse izdelke v košarici
		var cartRow = cartRows[i]  //cartRow = posamezen izdelek
		var priceElement = cartRow.getElementsByClassName('item-price')[0]  //Pridobimo CENO
		var quantityElement = cartRow.getElementsByClassName('item-quantity')[0] //Pridobimo KOLIČINO

		var price = parseFloat(priceElement.innerText.replace('€','')) //parseFloat(string->int) Zamenjamo € 
		var quantity = quantityElement.value //Dobimo value od QuantityElement-a
		total = total + (price * quantity) //VSOTA JE VSOTA + (CENA * KOLIČINA)
	}
	total = Math.round(total * 100) / 100 //Zaokrožimo vsoto
	document.getElementsByClassName('cart-total-price')[0].innerText = total + '€' //Dodamo nazaj €
}


function addToCartClicked(event){ //PRIDOBIMO POTREBNE PODATKE ZA DODATI V KOŠARICO
	var button = event.target  //kateri gump je sprožil Add To Cart
	var item = button.parentElement.parentElement //v Item damo dvojna starša od gumba (CELOTNO KOMPONENTO)
	var title = item.getElementsByClassName('title')[0].innerText  //Pridobimo IME
	var price = item.getElementsByClassName('price')[0].innerText  //Pridobimo CENO
	var imageSrc = item.getElementsByClassName('img-thumbnail')[0].src //Pridobimo URL SLIKE
	console.log(title, price, imageSrc)   //V konzoli izpišemo podatke (ni pomembno)
	addItemToCart(title, price, imageSrc)  //DODAMO KOMPONENTO V KOŠARO
	updateCartTotal()
}

function addItemToCart(title, price, imageSrc){
	var cartRow = document.createElement('div')  //Kreiramo element
	var cartItems = document.getElementsByClassName('cart-items')[0]  // cartItems = div za košarico
	var cartItemNames = cartItems.getElementsByClassName('title')  //pridobimo ime iz košarice(če je že dodana komponenta)
	console.log(cartItemNames)
	for(var i = 0; i < cartItemNames.length; i++){ //for loop za imena v košarici
		if(cartItemNames[i].innerText == title){   //Če je izdelek z imenom že v košarici
			alert('Izdelek je že v košarici')  //Vrne alert
			return //zaključi funkcijo. Nas vrne kjer smo jo klicali
		}
	} 							//STRUKTURA KREIRANEGA ELEMENTA
	var cartRowContents = `
	<div class="cart-items">
		<div class="cart-row row">
			<div class="col-md-3">
				<img src="${imageSrc}" class="img-thumbnail">
			</div>
			<div class="col-md-6">
				<p class="title" name="cpu" style="word-wrap: break-word;">${title}</p>
				<p class="item-price text-danger">${price}</p>
			</div>
			<div class="col-md-3"  align="right">
				<input class="item-quantity" type="number" value="1"><br>
				<button type="submit" class="btn btn-danger">Remove</button>
			</div>
		</div>
	</div>`
	cartRow.innerHTML = cartRowContents  //KREIRAN ELEMENT DODAMO V cartRow SPREMENLJIVKO
	cartItems.append(cartRow)  //prilepimo kreirano komponento na izbrani div (NOVO KOMPONENTO na KOŠARICO)
	cartRow.getElementsByClassName('btn btn-danger')[0].addEventListener('click',
		removeItemFromCart)
	cartRow.getElementsByClassName('item-quantity')[0].addEventListener('change',
		quantityChanged)  //ko dodamo nov izdelek ponovno definiramo gumpe in EventListener  
}







document.getElementById("komponente").onchange = function()   //sprememba v selectu
{ 
	var select = document.getElementById("komponente")
	if(document.getElementById("komponente").value === "cpu")  //primerjamo izbran value
	{
		var cpu = document.getElementById("cpu").innerHTML  //v spremenljivko damo izbrani div
		document.getElementById("komponenta").innerHTML = cpu        //zamenjamo div
		var addToCartButtons = document.getElementsByClassName('btn btn-success') //ponovno naložimo za gumb
		for (var i = 0; i < addToCartButtons.length; i++) {       //gremo čez vse gumbe
			var button = addToCartButtons[i]						//vedno prvo v spremenljivko
			button.addEventListener('click', addToCartClicked)		//event za klik
			updateCartTotal()                               //kličemo funkcijo za cart update						
		}
	}
	else if(document.getElementById("komponente").value === "motherboard")  
	{
		var motherboard = document.getElementById("motherboard").innerHTML   
		document.getElementById("komponenta").innerHTML = motherboard        
		var addToCartButtons = document.getElementsByClassName('btn btn-success') 
		for (var i = 0; i < addToCartButtons.length; i++) {       
			var button = addToCartButtons[i]						
			button.addEventListener('click', addToCartClicked)		
			updateCartTotal()
													
		}
	}
	else if(document.getElementById("komponente").value === "graphic")  
	{
		var graphic = document.getElementById("graphic").innerHTML
		document.getElementById("komponenta").innerHTML = graphic        
		var addToCartButtons = document.getElementsByClassName('btn btn-success') 
		for (var i = 0; i < addToCartButtons.length; i++) {       
			var button = addToCartButtons[i]						
			button.addEventListener('click', addToCartClicked)		
			updateCartTotal()
													
		}
	}
	else if(document.getElementById("komponente").value === "memory")  
	{
		var memory = document.getElementById("memory").innerHTML
		document.getElementById("komponenta").innerHTML = memory        
		var addToCartButtons = document.getElementsByClassName('btn btn-success') 
		for (var i = 0; i < addToCartButtons.length; i++) {       
			var button = addToCartButtons[i]						
			button.addEventListener('click', addToCartClicked)		
			updateCartTotal()
													
		}
	}
	else if(document.getElementById("komponente").value === "storage")  
	{
		var storage = document.getElementById("storage").innerHTML
		document.getElementById("komponenta").innerHTML = storage        
		var addToCartButtons = document.getElementsByClassName('btn btn-success') 
		for (var i = 0; i < addToCartButtons.length; i++) {       
			var button = addToCartButtons[i]						
			button.addEventListener('click', addToCartClicked)		
			updateCartTotal()
													
		}
	}
	else if(document.getElementById("komponente").value === "power")  
	{
		var power = document.getElementById("power").innerHTML
		document.getElementById("komponenta").innerHTML = power        
		var addToCartButtons = document.getElementsByClassName('btn btn-success') 
		for (var i = 0; i < addToCartButtons.length; i++) {       
			var button = addToCartButtons[i]						
			button.addEventListener('click', addToCartClicked)		
			updateCartTotal()
													
		}
	}
	else if(document.getElementById("komponente").value === "pc_case")  
	{
		var pcCase = document.getElementById("pc_case").innerHTML
		document.getElementById("komponenta").innerHTML = pcCase        
		var addToCartButtons = document.getElementsByClassName('btn btn-success') 
		for (var i = 0; i < addToCartButtons.length; i++) {       
			var button = addToCartButtons[i]						
			button.addEventListener('click', addToCartClicked)		
			updateCartTotal()
													
		}
	}
}


// // Get the modal
// var modal = document.getElementById("myModal");

// // Get the button that opens the modal
// document.getElementById("myBtn").onclick = function() {
// 	//alert('test')
//   modal.style.display = "block";
// }

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];


// // When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//   modal.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }


function showModal(id){
	// alert(id)
	var modal = document.getElementById(id); // Get the modal by ID
	modal.style.display = "block"; //Prikažemo skriti modal
	var span = document.getElementsByClassName(id)[0]; // Get the <span> element that closes the modal (Tokrat prek class-a, zaradi ponovitve ID-ja)
	span.onclick = function()   // When the user clicks on <span> (x), close the modal
	{
  		modal.style.display = "none"; //Spet zapremo modal
	}
	window.onclick = function(x)  //window object, ko kliknemo kamorkoli 
	{
	  	if (x.target == modal) { //Če kliknemo izven modala (Sivo ozadje), se zapre
	    modal.style.display = "none";
	  	}
	}
}
