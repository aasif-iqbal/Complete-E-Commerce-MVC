<style>
body {
  background-color: mintcream;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
.card {
  max-width: 30em;
  flex-direction: row;
  background-color: #696969;
  border: 0;
  box-shadow: 0 7px 7px rgba(0, 0, 0, 0.18);
  margin: 3em auto;
}
.card.dark {
  color: #fff;
}
.card.card.bg-light-subtle .card-title {
  color: dimgrey;
}

.card img {
  max-width: 25%;
  margin: auto;
  padding: 0.5em;
  border-radius: 0.7em;
}
.card-body {
  display: flex;
  justify-content: space-between;
}
.text-section {
  max-width: 60%;
}
.cta-section {
  max-width: 40%;
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  justify-content: space-between;
}
.cta-section .btn {
  padding: 0.3em 0.5em;
  /* color: #696969; */
}
.card.bg-light-subtle .cta-section .btn {
  background-color: #898989;
  border-color: #898989;
}
@media screen and (max-width: 475px) {
  .card {
    font-size: 0.9em;
  }
}

</style>
<div class="container">

  <div class="card dark">
    <img src="https://codingyaar.com/wp-content/uploads/chair-image.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <div class="text-section">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card's
          content.</p>
      </div>
      <div class="cta-section">
        <div>$129.00</div>
        <a href="#" class="btn btn-light">Buy Now</a>
      </div>
    </div>
  </div>

  <div class="card bg-light-subtle mt-4">
    <img src="https://codingyaar.com/wp-content/uploads/chair-image.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <div class="text-section">
        <h5 class="card-title fw-bold">Card title</h5>
        <p class="card-text">Some quick example text to build on the card's content.</p>
      </div>
      <div class="cta-section">
        <div>$129.00</div>
        <a href="#" class="btn btn-dark">Buy Now</a>
      </div>
    </div>
  </div>
  
  <div class="card bg-danger-subtle mt-4">
    <img src="https://codingyaar.com/wp-content/uploads/chair-image.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <div class="text-section">
        <h5 class="card-title fw-bold">Card title</h5>
        <p class="card-text">Some quick example text to build on the card's content.</p>
      </div>
      <div class="cta-section">
        <div>$129.00</div>
        <a href="#" class="btn btn-dark">Buy Now</a>
      </div>
    </div>
  </div>
  <div class="card bg-primary-subtle mt-4">
    <img src="https://codingyaar.com/wp-content/uploads/chair-image.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <div class="text-section">
        <h5 class="card-title fw-bold">Card title</h5>
        <p class="card-text">Some quick example text to build on the card's content.</p>
      </div>
      <div class="cta-section">
        <div>$129.00</div>
        <a href="#" class="btn btn-dark">Buy Now</a>
      </div>
    </div>
  </div>
  <div class="card bg-success-subtle mt-4">
    <img src="https://codingyaar.com/wp-content/uploads/chair-image.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <div class="text-section">
        <h5 class="card-title fw-bold">Card title</h5>
        <p class="card-text">Some quick example text to build on the card's content.</p>
      </div>
      <div class="cta-section">
        <div>$129.00</div>
        <a href="#" class="btn btn-dark">Buy Now</a>
      </div>
    </div>
  </div>
  <div class="card bg-warning-subtle mt-4">
    <img src="https://codingyaar.com/wp-content/uploads/chair-image.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <div class="text-section">
        <h5 class="card-title fw-bold">Card title</h5>
        <p class="card-text">Some quick example text to build on the card's content.</p>
      </div>
      <div class="cta-section">
        <div>$129.00</div>
        <a href="#" class="btn btn-dark">Buy Now</a>
      </div>
    </div>
  </div>
  <div class="card bg-info-subtle mt-4">
    <img src="https://codingyaar.com/wp-content/uploads/chair-image.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <div class="text-section">
        <h5 class="card-title fw-bold">Card title</h5>
        <p class="card-text">Some quick example text to build on the card's content.</p>
      </div>
      <div class="cta-section">
        <div>$129.00</div>
        <a href="#" class="btn btn-dark">Buy Now</a>
      </div>
    </div>
  </div>
  <div class="card bg-dark mt-4">
    <img src="https://codingyaar.com/wp-content/uploads/chair-image.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <div class="text-section">
        <h5 class="card-title fw-bold text-white">Card title</h5>
        <p class="card-text text-white">Some quick example text to build on the card's content.</p>
      </div>
      <div class="cta-section">
        <div class="text-white">$129.00</div>
        <a href="#" class="btn btn-light">Buy Now</a>
      </div>
    </div>
  </div>
  <div class="card bg-warning mt-4">
    <img src="https://codingyaar.com/wp-content/uploads/chair-image.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <div class="text-section">
        <h5 class="card-title fw-bold">Card title</h5>
        <p class="card-text">Some quick example text to build on the card's content.</p>
      </div>
      <div class="cta-section">
        <div>$129.00</div>
        <a href="#" class="btn btn-dark">Buy Now</a>
      </div>
    </div>
  </div>
  <div class="card bg-info mt-4">
    <img src="https://codingyaar.com/wp-content/uploads/chair-image.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <div class="text-section">
        <h5 class="card-title fw-bold text-white">Card title</h5>
        <p class="card-text text-white">Some quick example text to build on the card's content.</p>
      </div>
      <div class="cta-section">
        <div class="text-white">$129.00</div>
        <a href="#" class="btn btn-light">Buy Now</a>
      </div>
    </div>
  </div>
  <div class="card bg-dark-subtle mt-4">
    <img src="https://codingyaar.com/wp-content/uploads/chair-image.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <div class="text-section">
        <h5 class="card-title fw-bold">Card title</h5>
        <p class="card-text">Some quick example text to build on the card's content.</p>
      </div>
      <div class="cta-section">
        <div>$129.00</div>
        <a href="#" class="btn btn-dark">Buy Now</a>
      </div>
    </div>
  </div>
  <div class="card bg-success mt-4">
    <img src="https://codingyaar.com/wp-content/uploads/chair-image.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <div class="text-section">
        <h5 class="card-title fw-bold text-white">Card title</h5>
        <p class="card-text text-white">Some quick example text to build on the card's content.</p>
      </div>
      <div class="cta-section">
        <div class="text-white">$129.00</div>
        <a href="#" class="btn btn-light">Buy Now</a>
      </div>
    </div>
  </div>
</div>

<p class="mt-5 text-center">Get a step-by-step written explanation here: <a href="https://codingyaar.com/bootstrap-5-product-card-bootstrap-horizontal-card-2/" target="_blank">Bootstrap 5 Horizontal Product Card</a> </p>

<p class="mt-3 text-center">Get a step-by-step video explanation here: <a href="https://youtu.be/GaOKdDlR0lo" target="_blank">Bootstrap 5 Horizontal Product Card</a> </p>