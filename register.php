<h1>Register Form</h1>
<form action="register_db.php" role="form" method="post">
	<ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link active" id="pills-section1-tab" data-bs-toggle="pill" data-bs-target="#pills-section1" type="button" role="tab" aria-controls="pills-section1" aria-selected="true">1</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link" id="pills-section2-tab" data-bs-toggle="pill" data-bs-target="#pills-section2" type="button" role="tab" aria-controls="pills-section2" aria-selected="false">2</button>
		</li>
	</ul>
	<div class="tab-content" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-section1" role="tabpanel" aria-labelledby="pills-section1-tab">
			<div class="form-group row g-3 mb-3">
				<div class="col-6">
					<div class="form-floating">
						<input class="form-control" type="text" id="fname" name="f_name" placeholder="First Name">
						<label for="fname">First Name</label>
					</div>
				</div>
				<div class="col-6">
					<div class="form-floating">
						<input class="form-control" type="text" id="lname" name="l_name" placeholder="Last Name">
						<label for="lname">Last Name</label>
					</div>
				</div>
				<div class="col-6">
					<div class="form-floating">
						<select class="form-select" id="gender" name="gender" aria-label="gender">
							<option selected>Choose...</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Other</option>
						</select>
						<label for="gender">Gender</label>
					</div>
				</div>
				<div class="col-6">
					<div class="form-floating">
						<input class="form-control" type="date" id="birthDate" name="birthdate" min="1921-01-01" placeholder="Birth Date">
						<label for="birthDate">Birth Date</label>
					</div>
				</div>
				<div class="col-12">
					<div class="form-floating">
						<input class="form-control" type="text" id="address" name="address" placeholder="Address">
						<label for="address">Address</label>
					</div>
				</div>
				<div class="col-12">
					<div class="form-floating">
						<input class="form-control" type="tel" id="phone" name="tel" placeholder="xxx-xxx-xxxx" pattern="[0-9]{10}">
						<label for="phone">Phone</label>
					</div>
				</div>
				<div class="col-12">
					<div class="form-floating">
						<select class="form-select" id="role" name="role" aria-label="role">
							<option selected>Choose...</option>
							<option value="Student">Student</option>
							<option value="Tutor">Tutor</option>
						</select>
						<label for="role">role</label>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="pills-section2" role="tabpanel" aria-labelledby="pills-section2-tab">
			<div class="form-group row g-3">
				<div class="col-12">
					<div class="form-floating">
						<input class="form-control" type="email" id="email" name="email" placeholder="Email Address">
						<label for="email">Email Address</label>
					</div>
				</div>
				<div class="col-6">
					<div class="form-floating">
						<input class="form-control" type="password" id="password" name="password" placeholder="Password">
						<label for="password">Password</label>
					</div>
				</div>
				<div class="col-6">
					<div class="form-floating">
						<input class="form-control" type="password" id="confirmPassword" name="cf_password" placeholder="Password">
						<label for="confirmPassword">Confirm Password</label>
					</div>
				</div>
				<div class="col-12">
					<div class="form-floating">
						<input class="form-control" type="text" id="school" name="school" placeholder="School">
						<label for="school">School</label>
					</div>
				</div>
				<div class="col-6">
					<div class="form-floating">
						<input class="form-control" type="text" id="degree" name="degree" placeholder="Degree">
						<label for="degree">Degree</label>
					</div>
				</div>
				<div class="col-6">
					<div class="form-floating">
						<input class="form-control" type="text" id="grade" name="grade" placeholder="Grade">
						<label for="grade">Grade</label>
					</div>
				</div>
				<div class="col-12">
					<div class="form-floating">
						<div class="form-group padding">
							<div class="text-center"><button type="submit" name="reg_user">Register</button></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
