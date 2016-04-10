<?php


?>

<html>

          <div id="readroot_course" style="display: none">
              <br>

              <form name = "add_course" method ="POST" action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" accept-charset="UTF-8">

                    <input type="button" value="Remove review" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" />
                    <br><br>

                    <fieldset class = "busy">
                    <fieldset class = "course">

                        <legend class ="leg">Course: </legend>
                        <input class = "course_busy" name = "course_name" type = "text"
                              value="<?php if(isset($_POST["course_name"])) echo htmlspecialchars($_POST["course_name"]); ?>">
                    </fieldset>

                    <fieldset class="days">

                        <legend class = "leg">Day(s) of Week</legend>
                        <label for="monday">
                          <input type="checkbox" class="monday" />Mo
                        </label>

                        <label for="tuesday">
                          <input type="checkbox" class="tuesday" method = "POST" />Tu
                        </label>

                        <label for="wednesday">
                          <input type="checkbox" class="wednesday" />We
                        </label>

                        <label for="thursday">
                          <input type="checkbox" class="thursday" />Th
                        </label>

                        <label for="friday">
                          <input type="checkbox" class="friday" />Fr
                        </label>

                        <label for="saturday">
                          <input type="checkbox" class="saturday" />Sa
                        </label>

                        <label for="sunday">
                          <input type="checkbox" class="sunday" />Su
                        </label>

                    </fieldset>
                    <fieldset class="time">
                        <legend class = "leg"> Time </legend>

                        <label for="from">From
                          <input class =  "time_from" type="time" name="usr_time">
                        </label>

                        <label for="to"> To
                          <input class =  "time_to" type="time" name="usr_time">
                        </label>

                    </fieldset>
            <!--    </form> -->
              </fieldset>
          </div>
          <!--  task box  -->
          <div id="readroot_busy" style="display: none">
              <br>
          <!--    <form name = "add_busy" method ="POST"> -->
                  <input type="button" value="Remove review"
                        onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br><br>
                  <fieldset class = "busy">
                      <fieldset>
                          <legend class ="leg">Task: </legend>
                          <input class = "task_busy" type = "text">
                      </fieldset>
                      <fieldset class = "time">
                          <legend class = "leg">Date: </legend>
                          <input class = "date" type="date">
                      </fieldset>
                      <fieldset class="time">
                          <legend class = "leg">Time </legend>
                          <label for="from">From
                          <input class =  "time_from" type="time" name="usr_time">
                          </label>
                          <label for="to"> To
                          <input class =  "time_to" type="time" name="usr_time">
                          </label>
                      </fieldset>
                  </fieldset>
            <!--  </form> -->
          </div>

      <!--    <form name = "manage_form" method="POST" action="<?PHP/* echo htmlspecialchars($_SERVER['PHP_SELF']); ?*/?> " accept-charset="UTF-8"> -->

        <!--  </form> -->
      </form>


























      <form name = "course_and_task" method = "POST" action = "./add_courses.php">

              <div id="readroot_course" style="display: none">
                        <br>
                <input type="button" value="Remove review" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" />
                        <br><br>
                <fieldset class = "busy">
                    <fieldset class = "course">
                        <legend class ="leg"> Course: </legend>
                        <input name = "course" class = "course_busy" type ="text" >
                    </fieldset>
                    <fieldset class="days">
                        <legend class = "leg">Day(s) of Week</legend>
                        <label for="monday">
                        <input type="checkbox" class="monday" />Mo
                        </label>
                        <label for="tuesday">
                        <input type="checkbox" class="tuesday" />Tu
                        </label>
                        <label for="wednesday">
                        <input type="checkbox" class="wednesday" />We
                        </label>
                        <label for="thursday">
                        <input type="checkbox" class="thursday" />Th
                        </label>
                        <label for="friday">
                        <input type="checkbox" class="friday" />Fr
                        </label>
                        <label for="saturday">
                        <input type="checkbox" class="saturday" />Sa
                        </label>
                        <label for="sunday">
                        <input type="checkbox" class="sunday" />Su
                        </label>
                    </fieldset>
                    <fieldset class="time">
                        <legend class = "leg">Time</legend>
                        <label for="from">From
                        <input class =  "time_from" type="time" name="usr_time">
                        </label>
                        <label for="to"> To
                        <input class =  "time_to" type="time" name="usr_time">
                        </label>
                    </fieldset>
                </fieldset>

            </div>
            <div id="readroot_busy" style="display: none">
                <br>
                    <input type="button" value="Remove review"
                         onclick="this.parentNode.parentNode.removeChild(this.parentNode);" /><br><br>
                    <fieldset class = "busy">
                        <fieldset>
                            <legend class ="leg">Task: </legend>
                            <input class = "task_busy" type = "text">
                        </fieldset>
                        <fieldset class = "time">
                            <legend class = "leg">Date: </legend>
                            <input class = "date" type="date">
                        </fieldset>
                        <fieldset class="time">
                            <legend class = "leg">Time </legend>
                            <label for="from">From
                            <input class =  "time_from" type="time" name="usr_time">
                            </label>
                            <label for="to"> To
                            <input class =  "time_to" type="time" name="usr_time">
                            </label>
                        </fieldset>
                    </fieldset>

            </div>
            <input name = "submit_forms" type="submit" value="Save form">
      </form>

              <form method="GET" action = "profile.html">
                  <fieldset class = "full_sched">
                      <legend id = "all_sched">Schedule</legend>
                      <div id="" style="display: block;">
                      </div><span id="writeroot"></span>
                      </fieldset>
                      <br>
                  <input type="button" id="moreFields_course" value="Add Course"
                  onclick="init_course()">
                  <input type="button" id="moreFields_busy" value="Add Task"
                  onclick="init_busy()">

                  <p id = "yeah"></p>

                 <br><br><br><br><br>
              </form>


</html>
