<!-- Button trigger modal
<button type="button" class="btn btn-primary" >
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupmodalLabel">Sign up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form action="_handlesignup.php" method = "POST">
  <div class="mb-3">
    <label for="email" class="form-label">Username</label>
    <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp">

  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="cpassword" id="cpassword">
  </div>
  
  <button type="submit" class="btn btn-primary">Sign up</button>
</form>







      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Sign up</button> -->
      </div>
    </div>
  </div>
</div>
