#pragma config(Sensor, dgtl1,  DriveR,         sensorQuadEncoder)
#pragma config(Sensor, dgtl3,  DriveL,         sensorQuadEncoder)
#pragma config(Sensor, dgtl5,  Mogo,           sensorQuadEncoder)
#pragma config(Motor,  port1,           MogoR,         tmotorVex393_HBridge, openLoop)
#pragma config(Motor,  port2,           DriveR1,       tmotorVex393_MC29, openLoop, reversed)
#pragma config(Motor,  port3,           DriveR2,       tmotorVex393_MC29, openLoop)
#pragma config(Motor,  port4,           DriveR3,       tmotorVex393_MC29, openLoop, reversed)
#pragma config(Motor,  port7,           DriveL3,       tmotorVex393_MC29, openLoop)
#pragma config(Motor,  port8,           DriveL2,       tmotorVex393_MC29, openLoop, reversed)
#pragma config(Motor,  port9,           DriveL1,       tmotorVex393_MC29, openLoop)
#pragma config(Motor,  port10,          MogoL,         tmotorVex393_HBridge, openLoop, reversed)
//*!!Code automatically generated by 'ROBOTC' configuration wizard               !!*//

// This code is for the VEX cortex platform
#pragma platform(VEX2)

// Select Download method as "competition"
#pragma competitionControl(Competition)

//Main competition background code...do not modify!
#include "Vex_Competition_Includes.c"

#define JOYSTICK_THRESHOLD 20
#define ASYNC_MOGO_DONE_THRESHOLD 10

/*
 ______   ______   ______   ______  _________
|      | |      | |      | |      |     |
|      | |      | |      | |      |     |
|______| |      | |_____|  |      |     |
|  |     |      | |      | |      |     |
|    |   |      | |      | |      |     |
|      | |______| |______| |______|     |
*/

void resetDriveSensors();

int inchesToDistance(float inches);
int metersToDistance(float meters);
int degreesToRotation(float degrees);

bool moveDriveAsync(int distance, float distkP);
bool turnDriveAsync(int rotation);
bool moveMogoAsync(int pos, float kP);

//RICKY'S TURN CODE
int leftDrivePIDError = 0;
int leftDrivePIDLastError = 0;
int leftDrivePIDDerivative = 0;
int rightDrivePIDError = 0;
int rightDrivePIDLastError = 0;
int rightDrivePIDDerivative = 0;
bool driveStatus = false;
int moveCount = 0;
int PIDtimer = 0;
//END RICKY'S TURN CODE

void auton();

void resetDriveSensors()
{
	SensorValue[DriveL] = 0;
	SensorValue[DriveR] = 0;
}

void pre_auton()
{
	bStopTasksBetweenModes = true;
	SensorValue[Mogo] = 0;
	resetDriveSensors();
}

task autonomous()
{
}

task usercontrol()
{
	int DriveX = 0;
	int DriveY = 0;
	while(true)
	{
		if (abs(vexRT[Ch3]) > JOYSTICK_THRESHOLD) DriveX = vexRT[Ch3];
		else DriveX = 0;
		if (abs(vexRT[Ch4]) > JOYSTICK_THRESHOLD) DriveY = vexRT[Ch4];
		else DriveY = 0;

		if (abs(vexRT[Ch2]) > JOYSTICK_THRESHOLD)
		{
			motor[MogoL] = motor[MogoR] = vexRT[Ch2];
		}
		else
		{
			motor[MogoL] = motor[MogoR] = 0;
		}

		motor[DriveL1] = motor[DriveL2] = motor[DriveL3] = DriveX + DriveY;
		motor[DriveR1] = motor[DriveR2] = motor[DriveR3] = DriveX - DriveY;

		if(vexRT[Btn7R])
		{
			auton();
		}
	}
}

bool moveMogoAsync(int pos, float kP)
{

	float errorP = pos - SensorValue[Mogo];

	motor[MogoR] = errorP*kP;
	motor[MogoL] = errorP*kP;

	if(abs(errorP) < ASYNC_MOGO_DONE_THRESHOLD)
	{
		motor[MogoR] = 0;
		motor[MogoL] = 0;
		return true;
	}
	return false;
}

bool moveDriveAsync(int distance, float distkP)
{
	float kP = 1;

	int speed = 0;

	int waitTime = 50;

	int currentDistance = (abs(SensorValue[DriveL]) + abs(SensorValue[DriveR]))/2;

	int errorR = abs(SensorValue[DriveL]) - abs(SensorValue[DriveR]);
	int errorL = abs(SensorValue[DriveR]) - abs(SensorValue[DriveL]);
	int errorDist = abs(distance) - abs(currentDistance);

	int maxSpeed = 110;
	if(speed > maxSpeed)
	{
		speed = maxSpeed;
	}

	if(distance > 0)
	{
		if(currentDistance < distance)
		{
			speed = (distkP * errorDist);
			motor[DriveR1] = speed + (kP * errorR);
			motor[DriveR2] = speed + (kP * errorR);
			motor[DriveR3] = speed + (kP * errorR);
			motor[DriveL1] = speed + (kP * errorL);
			motor[DriveL2] = speed + (kP * errorL);
			motor[DriveL3] = speed + (kP * errorL);
			wait1Msec(waitTime);
		}
		else
		{
			motor[DriveL1] = 0;
			motor[DriveR1] = 0;
			motor[DriveL2] = 0;
			motor[DriveR2] = 0;
			motor[DriveL3] = 0;
			motor[DriveR3] = 0;
			resetDriveSensors();
			return true;
		}
	}
	else if(distance < 0)
	{
		distance = abs(distance);
		if(currentDistance < abs(distance))
		{
			speed = (distkP * errorDist);
			motor[DriveR1] = -(speed + (kP * errorR));
			motor[DriveL1] = -(speed + (kP * errorL));
			motor[DriveR2] = -(speed + (kP * errorR));
			motor[DriveL2] = -(speed + (kP * errorL));
			motor[DriveR3] = -(speed + (kP * errorR));
			motor[DriveL3] = -(speed + (kP * errorL));
			wait1Msec(waitTime);
		}
		else
		{
			motor[DriveL1] = 0;
			motor[DriveR1] = 0;
			motor[DriveL2] = 0;
			motor[DriveR2] = 0;
			motor[DriveL3] = 0;
			motor[DriveR3] = 0;
			resetDriveSensors();
			return true;
		}
	}
	return false;
}

bool turnDriveAsync(int rotation) {
	if (moveCount == 0) {
		leftDrivePIDLastError = rightDrivePIDError = leftDrivePIDDerivative = rightDrivePIDDerivative = 0;
		moveCount = 1;
		PIDtimer = 0;
	}
	driveStatus = false;

	leftDrivePIDError = rotation - SensorValue[DriveL];
	rightDrivePIDError = -1*rotation - SensorValue[DriveR];

	leftDrivePIDDerivative = leftDrivePIDError - leftDrivePIDLastError;
	rightDrivePIDDerivative = rightDrivePIDError - rightDrivePIDLastError;

	motor[DriveL1] = motor[DriveL2] = motor[DriveL3] = 2.6*leftDrivePIDError + 2*leftDrivePIDDerivative;
	motor[DriveR1] = motor[DriveR2] = motor[DriveR3] = 2.6*rightDrivePIDError + 2*rightDrivePIDDerivative;

	leftDrivePIDLastError = leftDrivePIDError;
	rightDrivePIDLastError = rightDrivePIDError;

	if (abs(rotation - SensorValue[DriveL]) < 5 || abs(-1*rotation - SensorValue[DriveR]) < 5) {
		PIDtimer++;
	}

	if (PIDtimer >= 1500) {
		moveCount = 0;
		driveStatus = true;
		resetDriveSensors();
		motor[DriveL1] = motor[DriveL2] = motor[DriveL3] = 0;
		motor[DriveR1] = motor[DriveR2] = motor[DriveR3] = 0;
	}

	return driveStatus;
}

int inchesToDistance(float inches)
{
	return (int)(inches*(360.0/12.5663706144));
}

int metersToDistance(float meters)
{
	return (int)(meters*(360.0/0.319185814));
}

int degreesToRotation(float degrees)
{
	return (int)(degrees*(300.0/90.0));
}

void auton()
{
	float kPMogo = 0.75;
	float kPNoMogo = 0.5;

	int mogoExtended = 120;
	int mogoRetracted = 5;
//1st Mogo for 20
	while(!moveMogoAsync(mogoExtended, 3));
	while(!moveDriveAsync(inchesToDistance(54), kPNoMogo));
	while(!moveMogoAsync(mogoRetracted, 3));
	while(!moveDriveAsync(inchesToDistance(-20), 0.3));
	while(!turnDriveAsync(degreesToRotation(205)));
	while(!moveDriveAsync(inchesToDistance(45), kPMogo));
	clearTimer(T1);
	while(!moveMogoAsync(mogoExtended, 3)){if(time1[T1] > 1000){motor[MogoL] = motor[MogoR] = 0;break;}}
	while(!moveDriveAsync(inchesToDistance(-20), kPNoMogo)) { moveMogoAsync(mogoRetracted, 3); }
//Grab second mogo for 10 pt
	while(!turnDriveAsync(degreesToRotation(-190)));
	while(!moveDriveAsync(inchesToDistance(-10), kPNoMogo));
	while(!moveMogoAsync(mogoExtended, 3));
	while(!moveDriveAsync(inchesToDistance(20), kPNoMogo));
	while(!moveMogoAsync(mogoRetracted, 3));
	while(!moveDriveAsync(inchesToDistance(-10), kPMogo));
	while(!turnDriveAsync(degreesToRotation(-180)));
	while(!moveDriveAsync(inchesToDistance(700), kPMogo));


}
