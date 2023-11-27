function validerProduitEnStock() {
  const produitStock = document.getElementById("produitStock").value;
 
  if (produitStock == 0) {
     return false;
  } else {
     return true;
  }
 }
 
 function validerProduit() {
  const produitStock = document.getElementById("produitStock").value;
  const erreurProduit = document.getElementById("erreurProduit");
 
  if (!validerProduitEnStock()) {
     erreurProduit.innerHTML = "Le produit n'est pas en stock.";
  } else {
     erreurProduit.innerHTML = "<span style='color:green'> Le produit est en stock </span>";
  }
 
  return validerProduitEnStock();
 }
 
 // Lister aux modifications de l'input produit
 const produitInput = document.getElementById("produit");
 produitInput.addEventListener("keyup", function () {
  validerProduit();
 });