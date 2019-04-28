<!DOCTYPE html>
<html>
<head>
<title>Search Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https:\\stackpath.bootstrapcdn.com\bootstrap\4.2.1\css\bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<link rel="stylesheet" href="https:\\use.fontawesome.com\releases\v5.1.0\css\all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

<link rel="stylesheet" href="css\index.css">


</head>

<body>

<form action="search_handle.php" method="post">
  <div class="container mainpage" >
    </br>
    </br>
    </br>
    <div class="row">
          

          <div style="float: left;" class="col-lg-3"></div>

          <div style="text-align: center;" class="col-lg-6">
                   <table id="searchtable">
                  <tbody>
                    <tr>
                      <th width="180" scope="col"><input  type="text" name="input_txt" size="20" placeholder="Search ..." required></th>
                      <th> </th>
                      <th width="80" scope="col"><span class="font1"> By </span> </th>
                      <th> </th>
                      <th scope="col"  width="100">
                          <span>

                                  <select  name="col_selected"  style="width: 120px">

                                    <option>-- select --</option>
                                    <option value="applicant_name" id="applicantname">Applicant name</option>
                                    <option value="university_name" id="universityname">University name</option>
                                    <option value="grad_school" id="gradschool">Grad school</option>
                                    <option value="gpa" id="gpa">GPA</option>
                                    <option value="landline" id="landline">Landline</option>
                                    <option value="current_date" id="currentdate">Apply date</option>
                                    <option value="position" id="position">Position</option>
                                    <option value="have_experience" id="haveexperience">Have experience</option>
                                    <option value="specialization" id="specialization">Specialization</option>
                                    <option value="resume_path" id="resumepath">Resume path</option>

                                  </select>

                              </span>
                      </th>

                      <th><button type="submit" style="margin-left: 30px;" class="btn btn-sm btn-primary" name="search" id="search" >Search</button></th>

                    </tr>

                  </tbody>
            </table>
          </div>
          <div style="float: right;" class="col-lg-3"></div>

    </div>
  </div>
</form>


<form action="searchall_handle.php" method="post">
  <div class="container mainpage" >
    </br>
    </br>
    </br>
    <div class="row">
          

          <div style="float: left;" class="col-lg-4"></div>

          <div style="text-align: center;" class="col-lg-4">
                   <table id="searchalltable">
                  <tbody>
                    <tr>
                      <th scope="col"  width="100">
                          <span>

                                  <select  name="column_selected"  style="width: 120px " required>

                                    <option>-- select --</option>
                                    <option value="applicant_name" id="applicantname">Applicant name</option>
                                    <option value="university_name" id="universityname">University name</option>
                                    <option value="grad_school" id="gradschool">Grad school</option>
                                    <option value="gpa" id="gpa">GPA</option>
                                    <option value="landline" id="landline">Landline</option>
                                    <option value="current_date" id="currentdate">Apply date</option>
                                    <option value="position" id="position">Position</option>
                                    <option value="have_experience" id="haveexperience">Have experience</option>
                                    <option value="specialization" id="specialization">Specialization</option>
                                    <option value="resume_path" id="resumepath">Resume path</option>

                                  </select>

                              </span>
                      </th>

                      <th><button type="submit" style="margin-left: 30px;" class="btn btn-sm btn-primary" name="searchall" >Search All</button></th>

                    </tr>

                  </tbody>
            </table>
          </div>
          <div style="float: right;" class="col-lg-4"></div>

    </div>
  </div>
</form>



</body>
</html>

