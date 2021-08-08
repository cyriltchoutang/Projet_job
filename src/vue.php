<?php


$count = $jobsImporter->importJobs();
echo sprintf("> %d jobs imported.\n", $count);

/* list jobs */
$jobsLister = new JobsLister(SQL_HOST, SQL_USER, SQL_PWD, SQL_DB);
$jobs = $jobsLister->listJobs();

echo sprintf("> all jobs (%d):\n", count($jobs));
?><table ><?php
foreach ($jobs as $job) {
  ?> 
  <th style="width: 100%;
border-collapse: collapse;
border: 3px solid purple;"><br> <?php echo sprintf(" %d: %s - %s - %s\n", $job['id'], $job['reference'], utf8_encode($job['title']), utf8_encode($job['publication']));?></th>
  <?php
}

echo sprintf("Done.\n");


?></table>