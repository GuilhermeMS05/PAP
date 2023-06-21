<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted mt-auto">
  <section class="p-2">
    <div class="text-center text-md-start mt-4">
      <!-- Grid row -->
      <div class="row mt-3 me-0">
        <!-- Grid column -->
        <div class="col-md-2 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <img src="../Imagens/RestaurantLogoRed.svg" alt="" width="40%" style="margin: auto;">
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-5 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Links Úteis
          </h6>
          <?php if(is_admin()) : ?>
            <p><a href="../HTML/funcionamento.php" class="text-reset">Horários</a></p>
          <?php else : ?> 
          <p><a href="#" class="text-reset" onclick='mostrarCard()'>Horários</a></p>
          <div id="darken-bg" class="darken-bg">
            <div class="card d-none card-caixa" id="card-caixa" id="darken-bg">
              <div class="card-body my-4 text-center">
                <h5 class="card-title"><strong>Horário de Funcionamento</strong></h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong>Segunda-Feira:</strong><?php echo "$segA - $segF" ?></li>
                  <li class="list-group-item"><strong>Terça-Feira:</strong><?php echo "$terA - $terF" ?></li>
                  <li class="list-group-item"><strong>Quarta-Feira:</strong><?php echo "$quaA - $quaF" ?></li>
                  <li class="list-group-item"><strong>Quinta-Feira:</strong><?php echo "$quiA - $quiF" ?></li>
                  <li class="list-group-item"><strong>Sexta-Feira:</strong><?php echo "$sexA - $sexF" ?></li>
                  <li class="list-group-item"><strong>Sábado:</strong><?php echo "$sabA - $sabF" ?></li>
                  <li class="list-group-item"><strong>Domingo:</strong><?php echo "$domA - $domF" ?></li>
                </ul>
                <button type="button" class="btn border border-2 border-danger" id="fechar-card">Fechar</button>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <?php if(is_admin()) : ?>
            <p><a href="../HTML/T_Espera.php" class="text-reset" id="botaoTP">Tempo de Espera</a></p>
          <?php else : ?>
          <p><a href="#" class="text-reset" id="botaoTP" onclick='mostrarCardTP()'>Tempo de Espera</a></p>
          <div id="darken-bgTP" class="darken-bg">
            <div class="card d-none card-caixa" id="card-caixaTP" id="darken-bgTP">
              <div class="card-body my-auto text-center">
                <h5 class="card-title"><strong>Tempo de Espera</strong></h5>
                <?php echo "<p>O seu pedido pode demorar, em média, $valor_min a $valor_max minutos para chegar à sua casa.</p>"; ?>
                <button type="button" class="btn border border-2 border-danger" id="fechar-cardTP">Fechar</button>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php if ($_SESSION['user'] == "") : ?>
            <p>
              <a href="../Login/user_login.php" class="text-reset">Entrar</a>
            </p>
          <?php else : ?>
            <p>
              <a href="../Login/user_logout.php" class="text-reset">Sair</a>
            </p>
          <?php endif; ?>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-5 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contato
          </h6>
          <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
              <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />
            </svg> Leiria, Leiria, Portugal</p>
          <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
              <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
            </svg>
            restaurantname@example.com
          </p>
          <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
            </svg> +351 999 999 999 </p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Copyright: Guilherme Silva
    <a class="text-reset fw-bold" href=""></a>
  </div>
  <!-- Copyright -->
</footer>