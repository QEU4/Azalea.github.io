let listProductHTML = document.querySelector('.listProduct');
let listCartHTML = document.querySelector('.listCart');
let listTotalHTML = document.querySelector('.listTotal');
let iconCart = document.querySelector('.icon-cart');
let iconCartSpan = document.querySelector('.icon-cart span');
let body = document.querySelector('body');
let closeCart = document.querySelector('.close');
let checkout = document.querySelector('.checkOut');
let products = [];
let cart = [];
let totalPrice = 0;
let totalPriceFixed = 0;
let studentDiscount = 0.85;
let isStudent = document.getElementById('isStudent');


//this  is a listener to open and close the cart
iconCart.addEventListener('click', () => {
  body.classList.toggle('showCart');
  listTotalHTML.innerHTML = `<span>Total: ${totalPrice}</span>`;
})
closeCart.addEventListener('click', () => {
  body.classList.toggle('showCart');
})

//this is for checkout button
checkout.addEventListener('click', () => {
  var text = "Thank you for shopping in Azalea giftshop, your total price is " + totalPrice;
  alert(text) 
  body.classList.toggle('showCart');
})

const addDataToHTML = () => {
  // remove datas default from HTML

  // add new datas
  if (products.length > 0) // if has data
  {
    products.forEach(product => {
      let newProduct = document.createElement('div');
      newProduct.dataset.id = product.id;
      newProduct.classList.add('item');
      newProduct.innerHTML =
        `<img src="${product.image}" alt="">
              <h2>${product.name}</h2>
              <div class="price">OR${product.price}</div>
              <button class="addCart">Add To Cart</button>`;
      listProductHTML.appendChild(newProduct);
    });
  }
}
//this listener is to add items to the cart based on id number related to the product
listProductHTML.addEventListener('click', (event) => {
  let positionClick = event.target;
  if (positionClick.classList.contains('addCart')) {
    let id_product = positionClick.parentElement.dataset.id;
    addToCart(id_product);
  }
})
const addToCart = (product_id) => {
  let positionThisProductInCart = cart.findIndex((value) => value.product_id == product_id);
  if (cart.length <= 0) {
    cart = [{
      product_id: product_id,
      quantity: 1
    }];
  } else if (positionThisProductInCart < 0) {
    cart.push({
      product_id: product_id,
      quantity: 1
    });
  } else {
    cart[positionThisProductInCart].quantity = cart[positionThisProductInCart].quantity + 1;
  }
  addCartToHTML();
  addCartToMemory();
}
const addCartToMemory = () => {
  localStorage.setItem('cart', JSON.stringify(cart));
}
const addCartToHTML = () => {
  listCartHTML.innerHTML = '';
  let totalQuantity = 0;
  totalPrice = 0;
  totalPriceFixed =0;
  
  //this is to count the number of item being added
  if (cart.length > 0) {
    cart.forEach(item => {
      totalQuantity = totalQuantity + item.quantity;
      let newItem = document.createElement('div');
      newItem.classList.add('item');
      newItem.dataset.id = item.product_id;

      let positionProduct = products.findIndex((value) => value.id == item.product_id);
      let info = products[positionProduct];
      
      //this will calculate the total price before and after discount
      totalPriceFixed +=(info.price * item.quantity);
        totalPrice += (info.price * item.quantity);
  
      //this is to show the cart 
      listCartHTML.appendChild(newItem);
      newItem.innerHTML = `
          <div class="image">
                  <img src="${info.image}">
              </div>
              <div class="name">
              ${info.name}
              </div>
              <div class="totalPrice">OR${info.price * item.quantity}</div>
              <div class="quantity">
                  <span class="minus">-</span>
                  <span>${item.quantity}</span>
                  <span class="plus">+</span>
              </div>
          `;
    })
  }
  iconCartSpan.innerText = totalQuantity;
}

//this function is for checking box if student then get the discount
isStudent.addEventListener('change', function() {
  if(isStudent.checked){
    totalPrice *= studentDiscount;
  }
  else{
    totalPrice = totalPriceFixed;
  }
  listTotalHTML.innerHTML = `<span>Total: ${totalPrice}</span>`;
});


//this shows when the user click on add or remove item from the cart 
listCartHTML.addEventListener('click', (event) => {
  let positionClick = event.target;
  if (positionClick.classList.contains('minus') || positionClick.classList.contains('plus')) {
    let product_id = positionClick.parentElement.parentElement.dataset.id;
    let type = 'minus';
    if (positionClick.classList.contains('plus')) {
      type = 'plus';
    }
    changeQuantityCart(product_id, type);
  }


listTotalHTML.innerHTML = `<span>Total: ${totalPrice}</span>`;


})

//this will show the increment of the quantity according to the user if he add or remove
const changeQuantityCart = (product_id, type) => {
  let positionItemInCart = cart.findIndex((value) => value.product_id == product_id);
  if (positionItemInCart >= 0) {
    let info = cart[positionItemInCart];
    switch (type) {
      case 'plus':
        cart[positionItemInCart].quantity = cart[positionItemInCart].quantity + 1;
        break;

      default:
        let changeQuantity = cart[positionItemInCart].quantity - 1;
        if (changeQuantity > 0) {
          cart[positionItemInCart].quantity = changeQuantity;
        } else {
          cart.splice(positionItemInCart, 1);
        }
        break;
    }
  }
  addCartToHTML();
  addCartToMemory();
}

const initApp = () => {
  // get data product
  fetch('products.json')
    .then(response => response.json())
    .then(data => {
      products = data;
      addDataToHTML();

      // get data cart from memory
      if (localStorage.getItem('cart')) {
        cart = JSON.parse(localStorage.getItem('cart'));
        addCartToHTML();
      }
    })
}
initApp()

