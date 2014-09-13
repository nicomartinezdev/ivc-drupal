<?php
/**
 * @file
 * Template to display a view as a mini calendar month.
 * 
 * @see template_preprocess_calendar_mini.
 *
 * $day_names: An array of the day of week names for the table header.
 * $rows: An array of data for each day of the week.
 * $view: The view.
 * $min_date_formatted: The minimum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * $max_date_formatted: The maximum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * 
 * $show_title: If the title should be displayed. Normally false since the title is incorporated
 *   into the navigation, but sometimes needed, like in the year view of mini calendars.
 * 
 */
//dsm('Display: '. $display_type .': '. $min_date_formatted .' to '. $max_date_formatted);dsm($day_names);
$params = array(
  'view' => $view,
  'granularity' => 'month',
  'link' => FALSE,
);
?>
<style>
#agenda-sidebar-title {
	background: url("/themes/bartik/images/agenda_sidebar_titulo.png") no-repeat;
}

#agenda-sidebar-title div {
	padding-top: 5px;
	margin-left: 30px;
	font-size: 1.1em;
	font-family: "gotham_mediumregular";
	color: #FFFFFF;
	text-transform: uppercase;
}

.calendar-calendar {
	height: 167px;
}

.calendar-calendar tr {
	background: none;
}

.calendar-calendar table.mini td.empty {
	background: none;
}

.calendar-calendar th.days {
	background: none;
	border: none;
	color: #68686B;
}

.calendar-calendar th.days div {
	width: 70%;
	font-size: 1.1em;
	margin-bottom: 2px;
}

.calendar-calendar th.sun {
	color: #FBBD00;
}

.calendar-calendar tbody td.has-no-events div.month {
	background: #DDDDDD no-repeat; 
	margin-bottom: 2px;
	width: 60%;
	padding: 2px;
}

.calendar-calendar tbody td div.month {
	-khtml-border-radius: 10%;
	-moz-border-radius: 10%;
	-webkit-border-radius: 10%;
	border-radius: 10%;
	text-align: center;	
	border: solid 1px #DDDDDD;
}

.calendar-calendar tr td.today, .calendar-calendar tr.odd td.today, .calendar-calendar tr.even td.today {
	background: none;
}

.calendar-calendar tbody td.has-events div.month {
	background: #FBBD00 no-repeat;
	border: solid 1px #FBBD00; 
	margin-bottom: 2px;
	width: 60%;
	padding: 2px;
}

.calendar-calendar tbody td.has-events a {
	font-weight: bold;
	color: #000000;
	text-decoration: none;
}
</style>

<div class="gcba-item-list">
	<div class="calendar-calendar">
		<div class="month-view" style="margin-left: 7px; height: inherit;"> 
			<table class="mini" align="center" style="height: inherit; vertical-align: middle; ">
			  <thead>
			    <tr>
			      <?php foreach ($day_names as $cell): ?>
			        <th class="<?php print $cell['class']; ?>">
			          <div class="day-text"><?php print $cell['data']; ?></div>
			        </th>
			      <?php endforeach; ?>
			    </tr>
			  </thead>
			  <tbody>
			    <?php foreach ((array) $rows as $row): ?>
			      <tr>
			        <?php foreach ($row as $cell): ?>
			          <td id="<?php print $cell['id']; ?>" class="<?php print $cell['class']; ?>">
			            <?php print $cell['data']; ?>
			          </td>
			        <?php endforeach; ?>
			      </tr>
			    <?php endforeach; ?>
			  </tbody>
			</table>
		</div>
	</div>
	<?php include("puntos.php") ?>
	<?php include("puntos.php") ?>
</div>