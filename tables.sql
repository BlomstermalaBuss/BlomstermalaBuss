CREATE TABLE Administrator (AdministratorID INT NOT NULL AUTO_INCREMENT UNIQUE KEY,
						    Username VARCHAR(32) NOT NULL PRIMARY KEY,
							Password VARCHAR (128) NOT NULL
						   );

CREATE INDEX Administrator_Username_Index ON Administrator(Username);						   

CREATE TABLE Traveler (TravelerID INT NOT NULL AUTO_INCREMENT UNIQUE KEY,
					   Name VARCHAR(40) NOT NULL,
					   SocialSecurityNr VARCHAR(30) NOT NULL,
					   Username VARCHAR(32) NOT NULL PRIMARY KEY,
					   Password VARCHAR (128) NOT NULL
					  );

CREATE INDEX Traveler_TravelerID_Index ON Traveler(TravelerID);
CREATE INDEX Traveler_Username_Index ON Traveler(Username);

CREATE TABLE Address (TravelerID INT NOT NULL UNIQUE KEY,
					  City VARCHAR(30) NOT NULL,
					  Zipcode VARCHAR(30) NOT NULL,
					  Street VARCHAR(30) NOT NULL,
					  Country VARCHAR(30) NOT NULL
					 );
					 
CREATE INDEX Address_TravelerID_Index ON Address(TravelerID);

CREATE TABLE WeeklySchedule (WeeklyScheduleID INT NOT NULL AUTO_INCREMENT UNIQUE KEY,
							 Departure VARCHAR(32) NOT NULL,
							 Destination VARCHAR(32) NOT NULL,
							 Day VARCHAR(10) NOT NULL,
							 DepartureTime TIME NOT NULL,
							 ArrivalTime TIME NOT NULL,
							 Price DOUBLE NOT NULL,
							 MaxTravelerAmount INT NOT NULL,
							 PRIMARY KEY (Departure, Destination, Day, DepartureTime, ArrivalTime)
							);
							
CREATE INDEX WeeklySchedule_WeeklyScheduleID_Index ON WeeklySchedule(WeeklyScheduleID);

CREATE TABLE Travel (TravelID INT NOT NULL AUTO_INCREMENT UNIQUE KEY,
					 Date DATE NOT NULL,
					 WeeklyScheduleID INT NOT NULL,
					 PRIMARY KEY (Date, WeeklyScheduleID),
					 FOREIGN KEY (WeeklyScheduleID) REFERENCES WeeklySchedule(WeeklyScheduleID)
						ON UPDATE CASCADE
						ON DELETE CASCADE
					);
					
CREATE INDEX Travel_TravelID_Index ON Travel(TravelID);

CREATE TABLE Booking (TravelerID INT NOT NULL,
					  TravelID INT NOT NULL,
					  BookingDate TIMESTAMP NOT NULL,
					  PRIMARY KEY(TravelerID, TravelID),
					  FOREIGN KEY (TravelerID) REFERENCES Traveler(TravelerID)
						ON UPDATE CASCADE
						ON DELETE CASCADE,
					  FOREIGN KEY (TravelID) REFERENCES Travel(TravelID)
						ON UPDATE CASCADE
						ON DELETE CASCADE
					 );
					  
CREATE INDEX Booking_TravelerID_Index ON Booking(TravelerID);
CREATE INDEX Booking_TravelID_Index ON Booking(TravelID);