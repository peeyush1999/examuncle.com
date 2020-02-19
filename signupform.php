<div class="modal fade" id="modal-register-user" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true" style="display: none;" >
        	<div class="modal-dialog">
        		<div class="modal-content">
					
        			
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">
        					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        				</button>
						<center>
						<b>
        				<h3 class="modal-title" id="modal-register-label" style="font-size:200%">User Registration Page</h3>
        				
						<p>Fill in the form below to get yourself registered:</p>
						</b>
						</center>
        			</div>
        			
        			<div class="modal-body">
						
					<form class="registration-form" id="register" action="uregistervalidate.php"  onsubmit="return user_reg_validate();" method="POST" >
						
								<div class="form-group">
									 <label><b>Username</b></label> 
									 <input type="text" placeholder="Enter Username" name="uname" class="form-first-name form-control" required> 
								</div>
								
								<div class="form-group">			
								 <label><b>Name</b></label> 
									 <input type="text" placeholder="Enter Your Name" name="name" class="form-first-name form-control" required> 
								</div>
								<div class="form-group">
									 <label><b>Password</b></label> 
								<input type="password" placeholder="Enter Password" name="password" class="form-first-name form-control" required> 
								</div>
								<div class="form-group">
									 <label><b>Confirm Password</b></label> 
									 <input type="password" placeholder="Confirm Password" name="cpassword" class="form-first-name form-control" required> 
								</div>
								
								<div class="form-group">
									 <label><b>Email</b></label> 
									 <input type="text" placeholder="Enter Your Email" name="email" class="form-first-name form-control" required> 
								</div>
								
								<div class="form-group" align="center">
								 <button type="submit" name="submit"  class="btn" style="width:30%" >Submit </button>  <button type="reset" name="reset"  class="btn" style="width:30%" >Reset </button> 
								</div>
							
						
					</form>


					</div>
        			
        		</div>
        	</div>
        </div>