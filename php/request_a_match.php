<?php

      require "database.php"; //include the database
      $db = new database();  //create a database object
      session_start();
      if (isset($_SESSION['email'])) {
            $id  =  $_SESSION['id'];
            if(isset($_POST['search'])) {

                $course       =  $_POST['course_name'];
                $start_from   =  $_POST['time_from'];
                $end_at       =  $_POST['time_to'];
                $date         =  $_POST['date_course'];

                if (!$course || !$start_from || !$end_at || !$date) {
                      $errorMsg = "can't leave some fields empty";
                } else {
                      echo $date;
                       require "request_match_utility.php";
                        $res   = request($course, $start_from, $end_at, $day, $date);  //get the result
                        $table = create_result($res);                           // creat a table for the result
                        $_SESSION['course_title'] = $course;
                        $_SESSION['time_from']    = $start_from;
                        $_SESSION['end_at']       = $end_at;
                        $_SESSION['date']         = $date;
                  }
            }
      }
?>
<!DOCTYPE>
<html>
    <head>
        <title> Request a Match </title>
        <link rel="stylesheet" type="text/css" href="../CSS/contact_style.css">
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
        <link rel="stylesheet" type="text/css" href="../CSS/profile.css">
        <link rel="stylesheet" type="text/css" href="../CSS/req.css">

      <!--  <script src="../Script/script.js"></script>
        <script src="../Script/datamanip.js"></script> -->

    </head>

    <body link="black">
        <iframe src = "../iframe.php" frameborder = "0" width="100%" height="130"  > </iframe>
        <div class = "pages_body">
        <div id="head_nav"> </div>

        <div id = "title">
            <h1>Request a Match</h1>
        </div>
        <br>
        <div id = "reqmatch">
            <div id = "select_course">
                <form method = "POST">
                    <?php
                        if(isset($errorMsg) && $errorMsg) {
                            echo "<p style=\"color: red;\">*",htmlspecialchars($errorMsg),"</p>\n\n";
                        }
                    ?>
                   <span> Course name   </span>
                    <select name = "course_name">
                     <option value =ACCT210> ACCT210 </option>
                     <option value =ACCT215> ACCT215 </option>
                     <option value =ACCT221> ACCT221 </option>
                     <option value =ACCT223> ACCT223 </option>
                     <option value =ACCT230> ACCT230 </option>
                     <option value =AGBU213> AGBU213 </option>
                     <option value =AGSC201> AGSC201 </option>
                     <option value =AGSC202> AGSC202 </option>
                     <option value =AGSC203> AGSC203 </option>
                     <option value =AGSC212> AGSC212 </option>
                     <option value =AGSC219> AGSC219 </option>
                     <option value =AGSC253> AGSC253 </option>
                     <option value =AGSC265> AGSC265 </option>
                     <option value =AGSC278> AGSC278 </option>
                     <option value =AGSC295> AGSC295 </option>
                     <option value =AGSC301> AGSC301 </option>
                     <option value =AGSC384> AGSC384 </option>
                     <option value =AMST215> AMST215 </option>
                     <option value =AMST301> AMST301 </option>
                     <option value =AMST275AB> AMST275AB </option>
                     <option value =AMST275AD> AMST275AD </option>
                     <option value =AMST375E> AMST375E </option>
                     <option value =ARAB102> ARAB102 </option>
                     <option value =ARAB202> ARAB202 </option>
                     <option value =ARAB204> ARAB204 </option>
                     <option value =ARAB205> ARAB205 </option>
                     <option value =ARAB207> ARAB207 </option>
                     <option value =ARAB212> ARAB212 </option>
                     <option value =ARAB213> ARAB213 </option>
                     <option value =ARAB217> ARAB217 </option>
                     <option value =ARAB219> ARAB219 </option>
                     <option value =ARAB222> ARAB222 </option>
                     <option value =ARAB223> ARAB223 </option>
                     <option value =ARAB224> ARAB224 </option>
                     <option value =ARAB225> ARAB225 </option>
                     <option value =ARAB228> ARAB228 </option>
                     <option value =ARAB232> ARAB232 </option>
                     <option value =ARAB234> ARAB234 </option>
                     <option value =ARAB236> ARAB236 </option>
                     <option value =ARAB238> ARAB238 </option>
                     <option value =ARAB246> ARAB246 </option>
                     <option value =ARAB201A> ARAB201A </option>
                     <option value =ARAB201B> ARAB201B </option>
                     <option value =ARAB251F> ARAB251F </option>
                     <option value =ARAB251J> ARAB251J </option>
                     <option value =AROL101> AROL101 </option>
                     <option value =AROL212> AROL212 </option>
                     <option value =AROL215> AROL215 </option>
                     <option value =AROL218> AROL218 </option>
                     <option value =AROL222> AROL222 </option>
                     <option value =AROL235M> AROL235M </option>
                     <option value =AROL235O> AROL235O </option>
                     <option value =AROL236E> AROL236E </option>
                     <option value =AVSC220> AVSC220 </option>
                     <option value =AVSC230> AVSC230 </option>
                     <option value =AVSC281> AVSC281 </option>
                     <option value =BIOC255> BIOC255 </option>
                     <option value =BIOL101> BIOL101 </option>
                     <option value =BIOL106> BIOL106 </option>
                     <option value =BIOL200> BIOL200 </option>
                     <option value =BIOL201> BIOL201 </option>
                     <option value =BIOL202> BIOL202 </option>
                     <option value =BIOL209> BIOL209 </option>
                     <option value =BIOL210> BIOL210 </option>
                     <option value =BIOL220> BIOL220 </option>
                     <option value =BIOL223> BIOL223 </option>
                     <option value =BIOL224> BIOL224 </option>
                     <option value =BIOL234> BIOL234 </option>
                     <option value =BIOL240> BIOL240 </option>
                     <option value =BIOL246> BIOL246 </option>
                     <option value =BIOL252> BIOL252 </option>
                     <option value =BIOL255> BIOL255 </option>
                     <option value =BIOL258> BIOL258 </option>
                     <option value =BIOL260> BIOL260 </option>
                     <option value =BIOL261> BIOL261 </option>
                     <option value =BIOL263> BIOL263 </option>
                     <option value =BIOL270> BIOL270 </option>
                     <option value =BIOL273> BIOL273 </option>
                     <option value =BIOL283> BIOL283 </option>
                     <option value =BIOL284> BIOL284 </option>
                     <option value =BIOL286> BIOL286 </option>
                     <option value =BIOL330> BIOL330 </option>
                     <option value =BIOL290AO> BIOL290AO </option>
                     <option value =BIOL290X> BIOL290X </option>
                     <option value =BUSS200> BUSS200 </option>
                     <option value =BUSS211> BUSS211 </option>
                     <option value =BUSS230> BUSS230 </option>
                     <option value =CHEM101> CHEM101 </option>
                     <option value =CHEM102> CHEM102 </option>
                     <option value =CHEM200> CHEM200 </option>
                     <option value =CHEM201> CHEM201 </option>
                     <option value =CHEM202> CHEM202 </option>
                     <option value =CHEM203> CHEM203 </option>
                     <option value =CHEM208> CHEM208 </option>
                     <option value =CHEM211> CHEM211 </option>
                     <option value =CHEM212> CHEM212 </option>
                     <option value =CHEM215> CHEM215 </option>
                     <option value =CHEM218> CHEM218 </option>
                     <option value =CHEM219> CHEM219 </option>
                     <option value =CHEM229> CHEM229 </option>
                     <option value =CHEM231> CHEM231 </option>
                     <option value =CHEM232> CHEM232 </option>
                     <option value =CHEM304> CHEM304 </option>
                     <option value =CHEM325> CHEM325 </option>
                     <option value =CHEN201> CHEN201 </option>
                     <option value =CHEN214> CHEN214 </option>
                     <option value =CHEN312> CHEN312 </option>
                     <option value =CHEN415> CHEN415 </option>
                     <option value =CHEN451> CHEN451 </option>
                     <option value =CHEN271> CHEN271 </option>
                     <option value =CHEN490> CHEN490 </option>
                     <option value =CHEN541> CHEN541 </option>
                     <option value =CHEN590> CHEN590 </option>
                     <option value =CHEN618> CHEN618 </option>
                     <option value =CHEN675> CHEN675 </option>
                     <option value =CHEN798A> CHEN798A </option>
                     <option value =CHIN201> CHIN201 </option>
                     <option value =CHIN202> CHIN202 </option>
                     <option value =CIVE201> CIVE201 </option>
                     <option value =CIVE210> CIVE210 </option>
                     <option value =CIVE251> CIVE251 </option>
                     <option value =CIVE252> CIVE252 </option>
                     <option value =CIVE310> CIVE310 </option>
                     <option value =CIVE370> CIVE370 </option>
                     <option value =CIVE410> CIVE410 </option>
                     <option value =CIVE411> CIVE411 </option>
                     <option value =CIVE413> CIVE413 </option>
                     <option value =CIVE414> CIVE414 </option>
                     <option value =CIVE430> CIVE430 </option>
                     <option value =CIVE460> CIVE460 </option>
                     <option value =CIVE461> CIVE461 </option>
                     <option value =CIVE520> CIVE520 </option>
                     <option value =CIVE521> CIVE521 </option>
                     <option value =CIVE522> CIVE522 </option>
                     <option value =CIVE523> CIVE523 </option>
                     <option value =CIVE541> CIVE541 </option>
                     <option value =CIVE553> CIVE553 </option>
                     <option value =CIVE602> CIVE602 </option>
                     <option value =CIVE612> CIVE612 </option>
                     <option value =CIVE629> CIVE629 </option>
                     <option value =CIVE636> CIVE636 </option>
                     <option value =CIVE672> CIVE672 </option>
                     <option value =CIVE683> CIVE683 </option>
                     <option value =CIVE530A> CIVE530A </option>
                     <option value =CIVE580A> CIVE580A </option>
                     <option value =CIVE691B> CIVE691B </option>
                     <option value =CMPS200> CMPS200 </option>
                     <option value =CMPS205> CMPS205 </option>
                     <option value =CMPS206> CMPS206 </option>
                     <option value =CMPS209> CMPS209 </option>
                     <option value =CMPS211> CMPS211 </option>
                     <option value =CMPS212> CMPS212 </option>
                     <option value =CMPS213> CMPS213 </option>
                     <option value =CMPS253> CMPS253 </option>
                     <option value =CMPS255> CMPS255 </option>
                     <option value =CMPS256> CMPS256 </option>
                     <option value =CMPS257> CMPS257 </option>
                     <option value =CMPS258> CMPS258 </option>
                     <option value =CMPS272> CMPS272 </option>
                     <option value =CMPS274> CMPS274 </option>
                     <option value =CMPS277> CMPS277 </option>
                     <option value =CMPS278> CMPS278 </option>
                     <option value =CMPS285> CMPS285 </option>
                     <option value =CMPS374> CMPS374 </option>
                     <option value =CMPS396N> CMPS396N </option>
                     <option value =CMPS396V> CMPS396V </option>
                     <option value =CVSP110> CVSP110 </option>
                     <option value =CVSP111> CVSP111 </option>
                     <option value =CVSP201> CVSP201 </option>
                     <option value =CVSP202> CVSP202 </option>
                     <option value =CVSP203> CVSP203 </option>
                     <option value =CVSP204> CVSP204 </option>
                     <option value =CVSP205> CVSP205 </option>
                     <option value =CVSP250> CVSP250 </option>
                     <option value =CVSP251> CVSP251 </option>
                     <option value =CVSP207I> CVSP207I </option>
                     <option value =CVSP208F> CVSP208F </option>
                     <option value =DCSN200> DCSN200 </option>
                     <option value =DCSN205> DCSN205 </option>
                     <option value =DCSN210> DCSN210 </option>
                     <option value =DCSN212> DCSN212 </option>
                     <option value =DCSN225> DCSN225 </option>
                     <option value =ECON101> ECON101 </option>
                     <option value =ECON102> ECON102 </option>
                     <option value =ECON203> ECON203 </option>
                     <option value =ECON211> ECON211 </option>
                     <option value =ECON212> ECON212 </option>
                     <option value =ECON213> ECON213 </option>
                     <option value =ECON214> ECON214 </option>
                     <option value =ECON215> ECON215 </option>
                     <option value =ECON217> ECON217 </option>
                     <option value =ECON218> ECON218 </option>
                     <option value =ECON219> ECON219 </option>
                     <option value =ECON221> ECON221 </option>
                     <option value =ECON227> ECON227 </option>
                     <option value =ECON235> ECON235 </option>
                     <option value =ECON236> ECON236 </option>
                     <option value =ECON240> ECON240 </option>
                     <option value =ECON242> ECON242 </option>
                     <option value =ECON217> ECON217 </option>
                     <option value =ECON328> ECON328 </option>
                     <option value =ECON333> ECON333 </option>
                     <option value =ECON341> ECON341 </option>
                     <option value =ECON342> ECON342 </option>
                     <option value =ECON295D> ECON295D </option>
                     <option value =ECON295H> ECON295H </option>
                     <option value =ECON303K> ECON303K </option>
                     <option value =EDUC211> EDUC211 </option>
                     <option value =EDUC215> EDUC215 </option>
                     <option value =EDUC217> EDUC217 </option>
                     <option value =EDUC218> EDUC218 </option>
                     <option value =EDUC219> EDUC219 </option>
                     <option value =EDUC220> EDUC220 </option>
                     <option value =EDUC221> EDUC221 </option>
                     <option value =EDUC223> EDUC223 </option>
                     <option value =EDUC224> EDUC224 </option>
                     <option value =EDUC225> EDUC225 </option>
                     <option value =EDUC230> EDUC230 </option>
                     <option value =EDUC251> EDUC251 </option>
                     <option value =EDUC256> EDUC256 </option>
                     <option value =EDUC274> EDUC274 </option>
                     <option value =EDUC281> EDUC281 </option>
                     <option value =EDUC316> EDUC316 </option>
                     <option value =EDUC321> EDUC321 </option>
                     <option value =EDUC322> EDUC322 </option>
                     <option value =EDUC326> EDUC326 </option>
                     <option value =EDUC290B> EDUC290B </option>
                     <option value =EDUC290C> EDUC290C </option>
                     <option value =EECE210> EECE210 </option>
                     <option value =EECE230> EECE230 </option>
                     <option value =EECE290> EECE290 </option>
                     <option value =EECE311> EECE311 </option>
                     <option value =EECE321> EECE321 </option>
                     <option value =EECE340> EECE340 </option>
                     <option value =EECE350> EECE350 </option>
                     <option value =EECE380> EECE380 </option>
                     <option value =EECE412> EECE412 </option>
                     <option value =EECE421> EECE421 </option>
                     <option value =EECE422> EECE422 </option>
                     <option value =EECE425> EECE425 </option>
                     <option value =EECE430> EECE430 </option>
                     <option value =EECE432> EECE432 </option>
                     <option value =EECE451> EECE451 </option>
                     <option value =EECE455> EECE455 </option>
                     <option value =EECE460> EECE460 </option>
                     <option value =EECE461> EECE461 </option>
                     <option value =EECE473> EECE473 </option>
                     <option value =EECE474> EECE474 </option>
                     <option value =EECE476> EECE476 </option>
                     <option value =EECE480> EECE480 </option>
                     <option value =EECE491> EECE491 </option>
                     <option value =EECE602> EECE602 </option>
                     <option value =EECE631> EECE631 </option>
                     <option value =EECE632> EECE632 </option>
                     <option value =EECE638> EECE638 </option>
                     <option value =EECE644> EECE644 </option>
                     <option value =EECE646> EECE646 </option>
                     <option value =EECE653> EECE653 </option>
                     <option value =EECE661> EECE661 </option>
                     <option value =EECE663> EECE663 </option>
                     <option value =EECE665> EECE665 </option>
                     <option value =EECE667> EECE667 </option>
                     <option value =EECE675> EECE675 </option>
                     <option value =EECE678> EECE678 </option>
                     <option value =ENGL102> ENGL102 </option>
                     <option value =ENGL104> ENGL104 </option>
                     <option value =ENGL106> ENGL106 </option>
                     <option value =ENGL108> ENGL108 </option>
                     <option value =ENGL203> ENGL203 </option>
                     <option value =ENGL204> ENGL204 </option>
                     <option value =ENGL205> ENGL205 </option>
                     <option value =ENGL207> ENGL207 </option>
                     <option value =ENGL209> ENGL209 </option>
                     <option value =ENGL212> ENGL212 </option>
                     <option value =ENGL214> ENGL214 </option>
                     <option value =ENGL219> ENGL219 </option>
                     <option value =ENGL221> ENGL221 </option>
                     <option value =ENGL224> ENGL224 </option>
                     <option value =ENGL226> ENGL226 </option>
                     <option value =ENGL227> ENGL227 </option>
                     <option value =ENGL229> ENGL229 </option>
                     <option value =ENGL230> ENGL230 </option>
                     <option value =ENGL231> ENGL231 </option>
                     <option value =ENGL233> ENGL233 </option>
                     <option value =ENGL236> ENGL236 </option>
                     <option value =ENGL238> ENGL238 </option>
                     <option value =ENGL239> ENGL239 </option>
                     <option value =ENGL240> ENGL240 </option>
                     <option value =ENGL247> ENGL247 </option>
                     <option value =ENGL249> ENGL249 </option>
                     <option value =ENGL252> ENGL252 </option>
                     <option value =ENGL252> ENGL252 </option>
                     <option value =ENGL292> ENGL292 </option>
                     <option value =ENGL300> ENGL300 </option>
                     <option value =ENGL100A> ENGL100A </option>
                     <option value =ENGL100B> ENGL100B </option>
                     <option value =ENGL244P> ENGL244P </option>
                     <option value =ENGL244Q> ENGL244Q </option>
                     <option value =ENGL254A> ENGL254A </option>
                     <option value =ENGL306R> ENGL306R </option>
                     <option value =ENGL306S> ENGL306S </option>
                     <option value =ENGL306T> ENGL306T </option>
                     <option value =ENGL306V> ENGL306V </option>
                     <option value =ENGL325G> ENGL325G </option>
                     <option value =ENGL346O> ENGL346O </option>
                     <option value =ENHL200> ENHL200 </option>
                     <option value =ENHL220> ENHL220 </option>
                     <option value =ENHL221> ENHL221 </option>
                     <option value =ENHL227> ENHL227 </option>
                     <option value =ENHL230> ENHL230 </option>
                     <option value =ENHL233> ENHL233 </option>
                     <option value =ENHL300> ENHL300 </option>
                     <option value =ENMG603> ENMG603 </option>
                     <option value =ENMG604> ENMG604 </option>
                     <option value =ENMG611> ENMG611 </option>
                     <option value =ENMG617> ENMG617 </option>
                     <option value =ENMG624> ENMG624 </option>
                     <option value =ENST300> ENST300 </option>
                     <option value =ENST320> ENST320 </option>
                     <option value =ENTM225> ENTM225 </option>
                     <option value =ENTM235> ENTM235 </option>
                     <option value =ENTM241> ENTM241 </option>
                     <option value =ENTM270> ENTM270 </option>
                     <option value =EPHD313> EPHD313 </option>
                     <option value =EPHD320> EPHD320 </option>
                     <option value =FAAH150> FAAH150 </option>
                     <option value =FAAH160> FAAH160 </option>
                     <option value =FAAH170> FAAH170 </option>
                     <option value =FAAH204> FAAH204 </option>
                     <option value =FAAH208> FAAH208 </option>
                     <option value =FAAH235> FAAH235 </option>
                     <option value =FAAH239> FAAH239 </option>
                     <option value =FAAH241> FAAH241 </option>
                     <option value =FAAH245> FAAH245 </option>
                     <option value =FAAH246> FAAH246 </option>
                     <option value =FAAH247> FAAH247 </option>
                     <option value =FAAH255> FAAH255 </option>
                     <option value =FAAH262> FAAH262 </option>
                     <option value =FAAH267> FAAH267 </option>
                     <option value =FAAH293> FAAH293 </option>
                     <option value =FAAH203C> FAAH203C </option>
                     <option value =FAAH203D> FAAH203D </option>
                     <option value =FAAH203E> FAAH203E </option>
                     <option value =FAAH203F> FAAH203F </option>
                     <option value =FAAH209F> FAAH209F </option>
                     <option value =FAAH227F> FAAH227F </option>
                     <option value =FAAH229E> FAAH229E </option>
                     <option value =FAAH229G> FAAH229G </option>
                     <option value =FAAH229K> FAAH229K </option>
                     <option value =FAAH229L> FAAH229L </option>
                     <option value =FAAH229M> FAAH229M </option>
                     <option value =FAAH238B> FAAH238B </option>
                     <option value =FAAH260B> FAAH260B </option>
                     <option value =FAAH260J> FAAH260J </option>
                     <option value =FINA210> FINA210 </option>
                     <option value =FINA215> FINA215 </option>
                     <option value =FINA218> FINA218 </option>
                     <option value =FINA220> FINA220 </option>
                     <option value =FINA222> FINA222 </option>
                     <option value =FINA230> FINA230 </option>
                     <option value =FINA241> FINA241 </option>
                     <option value =FINA250M> FINA250M </option>
                     <option value =FREN201> FREN201 </option>
                     <option value =FREN202> FREN202 </option>
                     <option value =GEOL101> GEOL101 </option>
                     <option value =GEOL102> GEOL102 </option>
                     <option value =GEOL201> GEOL201 </option>
                     <option value =GEOL202> GEOL202 </option>
                     <option value =GEOL203> GEOL203 </option>
                     <option value =GEOL204> GEOL204 </option>
                     <option value =GEOL205> GEOL205 </option>
                     <option value =GEOL211> GEOL211 </option>
                     <option value =GEOL213> GEOL213 </option>
                     <option value =GEOL214> GEOL214 </option>
                     <option value =GEOL219> GEOL219 </option>
                     <option value =GEOL224> GEOL224 </option>
                     <option value =GEOL226> GEOL226 </option>
                     <option value =GEOL318> GEOL318 </option>
                     <option value =HIST102> HIST102 </option>
                     <option value =HIST202> HIST202 </option>
                     <option value =HIST214> HIST214 </option>
                     <option value =HIST245> HIST245 </option>
                     <option value =HIST259> HIST259 </option>
                     <option value =HIST287> HIST287 </option>
                     <option value =HIST220D> HIST220D </option>
                     <option value =HIST258AQ> HIST258AQ </option>
                     <option value =HIST258AX> HIST258AX </option>
                     <option value =HIST278A> HIST278A </option>
                     <option value =HMPD342> HMPD342 </option>
                     <option value =HPCH201> HPCH201 </option>
                     <option value =HUMR248> HUMR248 </option>
                     <option value =INDE301> INDE301 </option>
                     <option value =INDE303> INDE303 </option>
                     <option value =INDE320> INDE320 </option>
                     <option value =INDE410> INDE410 </option>
                     <option value =INDE412> INDE412 </option>
                     <option value =INFO200> INFO200 </option>
                     <option value =INFO225> INFO225 </option>
                     <option value =INFO227> INFO227 </option>
                     <option value =ISLM333> ISLM333 </option>
                     <option value =LABM202> LABM202 </option>
                     <option value =LABM210> LABM210 </option>
                     <option value =LABM231> LABM231 </option>
                     <option value =LDEM211> LDEM211 </option>
                     <option value =LDEM217> LDEM217 </option>
                     <option value =LDEM220> LDEM220 </option>
                     <option value =LDEM230> LDEM230 </option>
                     <option value =LDEM263> LDEM263 </option>
                     <option value =LDEM264> LDEM264 </option>
                     <option value =LDEM290> LDEM290 </option>
                     <option value =LDEM291> LDEM291 </option>
                     <option value =MATH101> MATH101 </option>
                     <option value =MATH102> MATH102 </option>
                     <option value =MATH201> MATH201 </option>
                     <option value =MATH202> MATH202 </option>
                     <option value =MATH203> MATH203 </option>
                     <option value =MATH204> MATH204 </option>
                     <option value =MATH210> MATH210 </option>
                     <option value =MATH211> MATH211 </option>
                     <option value =MATH212> MATH212 </option>
                     <option value =MATH218> MATH218 </option>
                     <option value =MATH219> MATH219 </option>
                     <option value =MATH220> MATH220 </option>
                     <option value =MATH223> MATH223 </option>
                     <option value =MATH227> MATH227 </option>
                     <option value =MATH242> MATH242 </option>
                     <option value =MATH251> MATH251 </option>
                     <option value =MATH314> MATH314 </option>
                     <option value =MATH351> MATH351 </option>
                     <option value =MAUD204> MAUD204 </option>
                     <option value =MAUD205> MAUD205 </option>
                     <option value =MBIM223> MBIM223 </option>
                     <option value =MBIM237> MBIM237 </option>
                     <option value =MCOM201> MCOM201 </option>
                     <option value =MCOM202> MCOM202 </option>
                     <option value =MCOM203> MCOM203 </option>
                     <option value =MCOM204> MCOM204 </option>
                     <option value =MCOM210> MCOM210 </option>
                     <option value =MCOM211> MCOM211 </option>
                     <option value =MCOM221> MCOM221 </option>
                     <option value =MCOM230> MCOM230 </option>
                     <option value =MCOM240> MCOM240 </option>
                     <option value =MCOM242> MCOM242 </option>
                     <option value =MCOM251> MCOM251 </option>
                     <option value =MCOM263> MCOM263 </option>
                     <option value =MCOM290E> MCOM290E </option>
                     <option value =MCOM290F> MCOM290F </option>
                     <option value =MCOM290H> MCOM290H </option>
                     <option value =MCOM291E> MCOM291E </option>
                     <option value =MCOM292C> MCOM292C </option>
                     <option value =MCOM292D> MCOM292D </option>
                     <option value =MCOM295A> MCOM295A </option>
                     <option value =MCOM295F> MCOM295F </option>
                     <option value =MCOM295G> MCOM295G </option>
                     <option value =MCOM295I> MCOM295I </option>
                     <option value =MCOM390J> MCOM390J </option>
                     <option value =MCOM390M> MCOM390M </option>
                     <option value =MCOM390N> MCOM390N </option>
                     <option value =MECH220> MECH220 </option>
                     <option value =MECH230> MECH230 </option>
                     <option value =MECH310> MECH310 </option>
                     <option value =MECH314> MECH314 </option>
                     <option value =MECH320> MECH320 </option>
                     <option value =MECH332> MECH332 </option>
                     <option value =MECH340> MECH340 </option>
                     <option value =MECH341> MECH341 </option>
                     <option value =MECH412> MECH412 </option>
                     <option value =MECH414> MECH414 </option>
                     <option value =MECH420> MECH420 </option>
                     <option value =MECH421> MECH421 </option>
                     <option value =MECH430> MECH430 </option>
                     <option value =MECH432> MECH432 </option>
                     <option value =MECH436> MECH436 </option>
                     <option value =MECH513> MECH513 </option>
                     <option value =MECH520> MECH520 </option>
                     <option value =MECH600> MECH600 </option>
                     <option value =MECH619> MECH619 </option>
                     <option value =MECH630> MECH630 </option>
                     <option value =MECH633> MECH633 </option>
                     <option value =MECH637> MECH637 </option>
                     <option value =MECH641> MECH641 </option>
                     <option value =MECH654> MECH654 </option>
                     <option value =MECH681> MECH681 </option>
                     <option value =MECH760> MECH760 </option>
                     <option value =MECH761> MECH761 </option>
                     <option value =MEST201> MEST201 </option>
                     <option value =MEST240> MEST240 </option>
                     <option value =MEST241> MEST241 </option>
                     <option value =MEST242> MEST242 </option>
                     <option value =MEST301> MEST301 </option>
                     <option value =MEST322> MEST322 </option>
                     <option value =MEST323> MEST323 </option>
                     <option value =MEST325> MEST325 </option>
                     <option value =MEST331> MEST331 </option>
                     <option value =MEST340> MEST340 </option>
                     <option value =MEST341> MEST341 </option>
                     <option value =MEST342> MEST342 </option>
                     <option value =MEST210B> MEST210B </option>
                     <option value =MEST317I> MEST317I </option>
                     <option value =MEST317T> MEST317T </option>
                     <option value =MEST317U> MEST317U </option>
                     <option value =MEST318> MEST318 </option>
                     <option value =MKTG210> MKTG210 </option>
                     <option value =MKTG222> MKTG222 </option>
                     <option value =MKTG225> MKTG225 </option>
                     <option value =MKTG227> MKTG227 </option>
                     <option value =MKTG238> MKTG238 </option>
                     <option value =MKTG240> MKTG240 </option>
                     <option value =MNGT215> MNGT215 </option>
                     <option value =MNGT229> MNGT229 </option>
                     <option value =NFSC220> NFSC220 </option>
                     <option value =NFSC221> NFSC221 </option>
                     <option value =NFSC224> NFSC224 </option>
                     <option value =NFSC240> NFSC240 </option>
                     <option value =NFSC261> NFSC261 </option>
                     <option value =NFSC265> NFSC265 </option>
                     <option value =NFSC267> NFSC267 </option>
                     <option value =NFSC272> NFSC272 </option>
                     <option value =NFSC274> NFSC274 </option>
                     <option value =NFSC278> NFSC278 </option>
                     <option value =NFSC287> NFSC287 </option>
                     <option value =NFSC290> NFSC290 </option>
                     <option value =NFSC291> NFSC291 </option>
                     <option value =NFSC293> NFSC293 </option>
                     <option value =NFSC295> NFSC295 </option>
                     <option value =NFSC297> NFSC297 </option>
                     <option value =NFSC310> NFSC310 </option>
                     <option value =NURS200> NURS200 </option>
                     <option value =NURS201> NURS201 </option>
                     <option value =NURS202> NURS202 </option>
                     <option value =NURS302> NURS302 </option>
                     <option value =NURS306> NURS306 </option>
                     <option value =NURS402> NURS402 </option>
                     <option value =NURS408> NURS408 </option>
                     <option value =NURS410> NURS410 </option>
                     <option value =PHIL101> PHIL101 </option>
                     <option value =PHIL102> PHIL102 </option>
                     <option value =PHIL201> PHIL201 </option>
                     <option value =PHIL205> PHIL205 </option>
                     <option value =PHIL206> PHIL206 </option>
                     <option value =PHIL209> PHIL209 </option>
                     <option value =PHIL210> PHIL210 </option>
                     <option value =PHIL211> PHIL211 </option>
                     <option value =PHIL214> PHIL214 </option>
                     <option value =PHIL216> PHIL216 </option>
                     <option value =PHIL218> PHIL218 </option>
                     <option value =PHIL221> PHIL221 </option>
                     <option value =PHIL231> PHIL231 </option>
                     <option value =PHIL250D> PHIL250D </option>
                     <option value =PHIL252L> PHIL252L </option>
                     <option value =PHIL254D> PHIL254D </option>
                     <option value =PHIL260J> PHIL260J </option>
                     <option value =PHIL312D> PHIL312D </option>
                     <option value =PHYL246> PHYL246 </option>
                     <option value =PHYS101> PHYS101 </option>
                     <option value =PHYS103> PHYS103 </option>
                     <option value =PHYS200> PHYS200 </option>
                     <option value =PHYS205> PHYS205 </option>
                     <option value =PHYS210> PHYS210 </option>
                     <option value =PHYS211> PHYS211 </option>
                     <option value =PHYS212> PHYS212 </option>
                     <option value =PHYS220> PHYS220 </option>
                     <option value =PHYS223> PHYS223 </option>
                     <option value =PHYS226> PHYS226 </option>
                     <option value =PHYS236> PHYS236 </option>
                     <option value =PHYS303> PHYS303 </option>
                     <option value =PHYS305> PHYS305 </option>
                     <option value =PHYS232H> PHYS232H </option>
                     <option value =PPIA302> PPIA302 </option>
                     <option value =PPIA308> PPIA308 </option>
                     <option value =PPIA404> PPIA404 </option>
                     <option value =PSPA101> PSPA101 </option>
                     <option value =PSPA201> PSPA201 </option>
                     <option value =PSPA202> PSPA202 </option>
                     <option value =PSPA203> PSPA203 </option>
                     <option value =PSPA210> PSPA210 </option>
                     <option value =PSPA211> PSPA211 </option>
                     <option value =PSPA212> PSPA212 </option>
                     <option value =PSPA213> PSPA213 </option>
                     <option value =PSPA216> PSPA216 </option>
                     <option value =PSPA222> PSPA222 </option>
                     <option value =PSPA226> PSPA226 </option>
                     <option value =PSPA228> PSPA228 </option>
                     <option value =PSPA232> PSPA232 </option>
                     <option value =PSPA233> PSPA233 </option>
                     <option value =PSPA235> PSPA235 </option>
                     <option value =PSPA236> PSPA236 </option>
                     <option value =PSPA238> PSPA238 </option>
                     <option value =PSPA250> PSPA250 </option>
                     <option value =PSPA253> PSPA253 </option>
                     <option value =PSPA254> PSPA254 </option>
                     <option value =PSPA256> PSPA256 </option>
                     <option value =PSPA259> PSPA259 </option>
                     <option value =PSPA260> PSPA260 </option>
                     <option value =PSPA261> PSPA261 </option>
                     <option value =PSPA262> PSPA262 </option>
                     <option value =PSPA272> PSPA272 </option>
                     <option value =PSPA275> PSPA275 </option>
                     <option value =PSPA276> PSPA276 </option>
                     <option value =PSPA277> PSPA277 </option>
                     <option value =PSPA297> PSPA297 </option>
                     <option value =PSPA310> PSPA310 </option>
                     <option value =PSPA316> PSPA316 </option>
                     <option value =PSPA288AA> PSPA288AA </option>
                     <option value =PSPA288K> PSPA288K </option>
                     <option value =PSPA288W> PSPA288W </option>
                     <option value =PSPA289L> PSPA289L </option>
                     <option value =PSPA293D> PSPA293D </option>
                     <option value =PSPA293F> PSPA293F </option>
                     <option value =PSPA293I> PSPA293I </option>
                     <option value =PSPA329G> PSPA329G </option>
                     <option value =PSYC101> PSYC101 </option>
                     <option value =PSYC101> PSYC101 </option>
                     <option value =PSYC201> PSYC201 </option>
                     <option value =PSYC210> PSYC210 </option>
                     <option value =PSYC214> PSYC214 </option>
                     <option value =PSYC215> PSYC215 </option>
                     <option value =PSYC216> PSYC216 </option>
                     <option value =PSYC220> PSYC220 </option>
                     <option value =PSYC229> PSYC229 </option>
                     <option value =PSYC230> PSYC230 </option>
                     <option value =PSYC232> PSYC232 </option>
                     <option value =PSYC235> PSYC235 </option>
                     <option value =PSYC280> PSYC280 </option>
                     <option value =PSYC282> PSYC282 </option>
                     <option value =PSYC284> PSYC284 </option>
                     <option value =PSYC288> PSYC288 </option>
                     <option value =PSYC240B> PSYC240B </option>
                     <option value =PSYC240G> PSYC240G </option>
                     <option value =SOAN101> SOAN101 </option>
                     <option value =SOAN103> SOAN103 </option>
                     <option value =SOAN201> SOAN201 </option>
                     <option value =SOAN203> SOAN203 </option>
                     <option value =SOAN211> SOAN211 </option>
                     <option value =SOAN213> SOAN213 </option>
                     <option value =SOAN221> SOAN221 </option>
                     <option value =SOAN223> SOAN223 </option>
                     <option value =SOAN224> SOAN224 </option>
                     <option value =SOAN237> SOAN237 </option>
                     <option value =SOAN240> SOAN240 </option>
                     <option value =SOAN245> SOAN245 </option>
                     <option value =SOAN304> SOAN304 </option>
                     <option value =SOAN290AD> SOAN290AD </option>
                     <option value =SOAN290AE> SOAN290AE </option>
                     <option value =SOAN324X> SOAN324X </option>
                     <option value =STAT201> STAT201 </option>
                     <option value =STAT210> STAT210 </option>
                     <option value =STAT23O> STAT23O </option>
                     <option value =STAT233> STAT233 </option>
              </select>
                    <br><br>
                    From: <input type="time" name="time_from"  >
                    To:   <input type="time" name="time_to"    >
                    <input type = "date"       name="date_course"><br>
                    <br>
                    <br>
                    <input id = "search" type="submit" name="search" value="Search">
                </form>
            </div>


            <div>
                <div>

                    <table id = "table_looks">

                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>


                                <form method = "POST" >
                                        <?php
                                        //print the result
                                        if($res) {
                                            for($i = 0; $i < count($table); $i++) {
                                                    $value_1 =  $table[$i][0];
                                                    $value_2 =  $table[$i][1];
                                                    $value_3 =  $table[$i][2];
                                                    $value_4 =  $table[$i][3];

                                                    if (strcmp($value_4, $id) !== 0) {
                                                      echo  "<tr><td><input type='radio' name='name' value ='$value_4' >$value_1 </td> <td>$value_2</td> </tr>";
                                                    //echo $table[$i][0];
                                                    }
                                            }
                                            if(count($table) == 0) {
                                                 echo "<tr> <td> NO MATCH FOUND<td></tr>";
                                            } else if (count($table) == 1)  {
                                                 $value_4 =  $table[0][3];
                                                 if (strcmp($value_4, $id) === 0) {
                                                       echo "<tr> <td> NO MATCH FOUND<td></tr>";
                                                 } else {
                                                      echo "<tr><td></td><td><input id = 'send_req' name ='send' type = 'submit'></td>";
                                                 }
                                           } else {
                                                 echo "<tr><td></td><td><input id = 'send_req' name ='send' type = 'submit'></td>";
                                           }
                                        }
                                        if (isset($_POST['send'])) {
                                            $sug_id      = $_POST['name'];
                                            $id          = $_SESSION['id'];
                                            $req_t       = $_SESSION['course_title'];
                                            $req_from    = $_SESSION['time_from'];
                                            $req_to      = $_SESSION['end_at'];
                                            $req_date    = $_SESSION['date'];

                                            $stmt = "INSERT into REQUESTS (USERID_FROM, USERID_TO, COURSE_TITLE, TIME_FROM, TIME_TO, REQUEST_DATE) values ('$id', '$sug_id', '$req_t', '$req_from', '$req_to', '$req_date')";
                                             require_once "database.php";
                                            //mysqli_query($connection, $stmt);
                                            $db->query($stmt);
                                        }
                                        ?>
                                </form>
                    </table>

                </div>
            </div>
        </div>
 </div>
    </body>
</html>
