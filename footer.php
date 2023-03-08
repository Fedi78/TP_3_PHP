 </div>
        <div id="modalSupp"class="modal fade" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Confirmation de Suppression</h5>
          </div>
          <div class="modal-body">
            <p>êtes-vous sûr de vouloir supprimer cette nationalité ?</p>
          </div>
          <div class="modal-footer">
            <a href="="class="btn btn-primary" id="btnSuppr">Supprimer</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Ne pas Supprimer</button>
          </div>
        </div>
      </div>
    </div>
    <footer class="container">
      <p>&copy; Company 2017-2018</p>
    </footer>
        
     
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  <script> type="text/javascript">

$("a[data-supp]").click(function(){
   var lien = $(this).attr("data-supp");
   var message = $(this).attr("data-message");
   $("#btnSuppr").attr("href",lien);
   $(".modal-body").text(message);
});

  </script>
</body>
</html>
