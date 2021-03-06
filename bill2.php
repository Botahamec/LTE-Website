<!DOCTYPE html>
<html>
	<head>
		<title>Algorithmic Seat Count Act</title>
		<?php require(__DIR__ . '/metadata.html'); ?>
	</head>
	<body>
		<?php require(__DIR__ . '/navbar.html'); ?>
		<div class="article">
			<div class="section" id="A1"><h2>Algorithmic Seat Count Act</h2></div>
			<div class="subnav">
				<div class="subbtn1"><a href="#A1"><button class="navbtn" style="width: 49%">Algorithmic Seat Count Act</button><div class="subbtn1-drop">
					<a href="#A2">Preamble</a>
					<a href="#A3">Article I</a>
					<a href="#A4">Article II</a>
				</div></a></div>
			</div>
			<div class="section" id="A2">
				<h3>Preamble</h3>
				<p>The LTE Constitution states that the seat to voter ratio may be determined by a majority vote in Congress. This bill aims to implement an algorithm which would create the seat to voter ratio that is the most proportional before each election.</p>
			</div>
			<div class="section" id="A3">
				<h3>Article I: Use of the Alogithm</h3>
				<h4>Section 1: Time of Use</h4>
				<p>The algorithm is to be used the day of the primary elections of any midterm or general election in order to determine the number of seats in the House of Representatives for each region. This algorithm will also give the seat to voter ratio for the next house term.</p>
				<h4>Section 2: How to Use</h4>
				<p>In order to use the algorithm, the user must first enter the number of registered voters in each region when prompted to do so, by typing in the number and then pressing enter. The algorithm will immediately return the number of seats for each region and the seat to voter ratio for the next house term. The enter key may be pressed until the number of seats for each region is satisfactory to the Secretary of State. After the election, whatever the seat to voter ratio was calculated to be at the start of the election, shall be the seat to voter ratio for the rest of the house term, where dividing the number of voters in a region by the seat to voter ratio produces the number of seats for that region, which must be rounded to the nearest whole number. If the division creates a number equidistant from two whole numbers, (ex. 4.5) then the number of seats will be rounded up to the nearest whole number.</p>
				<h4>Section 3: Result Verification</h4>
				<p>The result of the algorithm must be verified by the Secretary of State. They are to use the algorithm that is given in Article II of this act. The code may not be edited unless a majority of Congress votes to do so. The code known to run correctly in a Python 3.6 compiler on Windows 10. The code must be available to all citizens of the LTE Discord server through the following GitHub repository link in the file named, idea.py: <a href="https://github.com/Botahamec/ASCA-Algorithm" class="link">https://github.com/Botahamec/ASCA-Algorithm</a></p>
			</div>
			<div class="section" id="A4">
				<h3>Article II: Algorithm</h3>
				<code>
					import sys<br />
					import math<br />
					<br />
					#asks for voters per region<br />
					nevotes = int(input("How many registered voters are in the Northeast?"))<br />
					sevotes = int(input("How many registered voters are in the Southeast?"))<br />
					mwvotes = int(input("How many registered voters are in the Midwest?"))<br />
					swvotes = int(input("How many registered voters in the Southwest?"))<br />
					westvotes = int(input("How many registered voters are in the West?"))<br />
					osvotes = int(input("How many registered voters are Overseas?"))<br />
					voters = nevotes + sevotes + mwvotes + swvotes + westvotes + osvotes #total voters<br />
					<br />
					#asks for number of candidates<br />
					necands = int(input("How many candidates are in the Northeast?"))<br />
					secands = int(input("How many candidates are in the Southeast?"))<br />
					mwcands = int(input("How many candidates are in the Midwest?"))<br />
					swcands = int(input("How many candidates are in the Southwest?"))<br />
					westcands = int(input("How many candidates are in the West?"))<br />
					oscands = int(input("How many candidates are Overseas?"))<br />
					<br />
					#calculates the highest number of voters for a region<br />
					highvotes = nevotes #i assume automatically the northeast will, to save time<br />
					if (highvotes < osvotes) : highvotes = osvotes<br />
					if (highvotes < mwvotes) : highvotes = mwvotes<br />
					if (highvotes < sevotes) : highvotes = sevotes<br />
					if (highvotes < westvotes) : highvotes = westvotes<br />
					if (highvotes < swvotes) : highvotes = swvotes<br />
					<br />
					delta = 1 / highvotes<br />
					total = voters / 2 #times the loop will run, impossible to have less than one seat<br />
					total += 1 #number of times the loop will run + 1<br />
					invalid = [1] #one will not be used as a seat to voter ratio<br />
					<br />
					while (True):<br />
						&emsp;<br />
						&emsp;#pre-defines number of seats, in case no intervals work<br />
						&emsp;neseats = 1.0<br />
						&emsp;seseats = 1.0<br />
						&emsp;mwseats = 1.0<br />
						&emsp;swseats = 1.0<br />
						&emsp;westseats = 1.0<br />
						&emsp;osseats = 1.0<br />
						&emsp;<br />
						&emsp;lowerror = 0 #calculates which ratio works best, set to 0<br />
						&emsp;interval = 1 #i don't like for loops<br />
						&emsp;<br />
						&emsp;#starting the algorithm<br />
						&emsp;while (interval < total) :<br />
						&emsp;&emsp;<br />
						&emsp;&emsp;valid = True<br />
						&emsp;&emsp;<br />
						&emsp;&emsp;netest = int(round(nevotes / interval))<br />
						&emsp;&emsp;setest = int(round(sevotes / interval))<br />
						&emsp;&emsp;mwtest = int(round(mwvotes / interval))<br />
						&emsp;&emsp;swtest = int(round(swvotes / interval))<br />
						&emsp;&emsp;westtest = int(round(westvotes / interval))<br />
						&emsp;&emsp;ostest = int(round(osvotes / interval))<br>
						&emsp;&emsp;<br>
						&emsp;&emsp;if (ostest == 0) : valid = False<br>
						&emsp;&emsp;if (westtest == 0) : valid = False<br>
						&emsp;&emsp;if (swtest == 0) : valid = False<br>
						&emsp;&emsp;if (mwtest == 0) : valid = False<br>
						&emsp;&emsp;if (setest == 0) : valid = False<br>
						&emsp;&emsp;if (netest == 0) : valid = False<br>
						&emsp;&emsp;<br>
						&emsp;&emsp;if (ostest > oscands) : valid = False<br>
						&emsp;&emsp;if (westtest > westcands) : valid = False<br>
						&emsp;&emsp;if (swtest > swcands) : valid = False<br>
						&emsp;&emsp;if (mwtest > mwcands) : valid = False<br>
						&emsp;&emsp;if (setest > secands) : valid = False<br>
						&emsp;&emsp;if (netest > necands) : valid = False<br>
						&emsp;&emsp;<br>
						&emsp;&emsp;if (interval in invalid) : valid = False<br>
						&emsp;&emsp;<br>
						&emsp;&emsp;if (valid):<br>
							&emsp;&emsp;&emsp;<br>
							&emsp;&emsp;&emsp;#calculates the error for each interval<br>
							&emsp;&emsp;&emsp;neerr = abs(.5 - (nevotes % interval / interval))<br>
							&emsp;&emsp;&emsp;seerr = abs(.5 - (sevotes % interval / interval))<br>
							&emsp;&emsp;&emsp;mwerr = abs(.5 - (mwvotes % interval / interval))<br>
							&emsp;&emsp;&emsp;swerr = abs(.5 - (swvotes % interval / interval))<br>
							&emsp;&emsp;&emsp;westerr = abs(.5 - (westvotes % interval / interval))<br>
							&emsp;&emsp;&emsp;oserr = abs(.5 - (osvotes % interval / interval))<br>
							&emsp;&emsp;&emsp;err = neerr + seerr + mwerr + swerr + westerr + oserr<br>
							&emsp;&emsp;&emsp;<br>
							&emsp;&emsp;&emsp;#if error is low, then the number of seats per region is recorded<br>
							&emsp;&emsp;&emsp;if (err >= lowerror) :<br>
								&emsp;&emsp;&emsp;&emsp;lowerror = err #sets the lowest error<br>
								&emsp;&emsp;&emsp;&emsp;ratio = interval #records the seat to voter ratio<br>
								&emsp;&emsp;&emsp;&emsp;neseats = netest<br>
								&emsp;&emsp;&emsp;&emsp;seseats = setest<br>
								&emsp;&emsp;&emsp;&emsp;mwseats = mwtest<br>
								&emsp;&emsp;&emsp;&emsp;swseats = swtest<br>
								&emsp;&emsp;&emsp;&emsp;westseats = westtest<br>
								&emsp;&emsp;&emsp;&emsp;osseats = ostest<br>
						&emsp;&emsp;&emsp;<br>
						&emsp;&emsp;interval += delta #increases the interval and starts the loop again<br>
					&emsp;<br>
					&emsp;#prints the number of seats required<br>
					&emsp;print("_____________________________________________________________")<br>
					&emsp;print ("Northeast: " + str(neseats))<br>
					&emsp;print ("Southeast: " + str(seseats))<br>
					&emsp;print ("Midwest:   " + str(mwseats))<br>
					&emsp;print ("Southwest: " + str(swseats))<br>
					&emsp;print ("West:      " + str(westseats))<br>
					&emsp;print ("Overseas:  " + str(osseats))<br>
					&emsp;<br>
					&emsp;print ("") #enters a blank line<br>
					&emsp;print ("Seat Ratio: 1 Representative per " + str(ratio) + " Voters")<br>
					&emsp;print ("Accuracy: " + str(lowerror * (100/3)) + "%")<br>
					&emsp;<br>
					&emsp;#asks for a different result<br>
					&emsp;wait = input ("Press enter for a different result")<br>
					&emsp;invalid.append (ratio)<br>
						
				</code>
			</div>
		</div>
	</body>
</html>
