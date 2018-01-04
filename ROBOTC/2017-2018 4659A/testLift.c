
#pragma config(Motor,  port4,           liftL,         tmotorVex393_MC29, openLoop)
#pragma config(Motor,  port6,           liftR,         tmotorVex393_MC29, openLoop)
//*!!Code automatically generated by 'ROBOTC' configuration wizard               !!*//

task main()
{
	while(true){
		if(vexRT[Btn5U]){
			motor[liftL] = 127;
			motor[liftR] = 127;
		}
		else if(vexRT[Btn5D]){
			motor[liftL] = -127;
			motor[liftR] = -127;
		}
		else{
			motor[liftL] = 0;
			motor[liftR] = 0;
		}
		if(vexRT[Btn6U]){
			motor[liftR] = 127;
		}
		else if(vexRT[Btn6D]){
			motor[liftR] = -127;
		}
		else{
			motor[liftR] = 0;
		}
	}


}
