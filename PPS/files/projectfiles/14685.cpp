#include "glut.h"


const double PI = 3.14;
static GLint spin = 0;

void init(void)
{
	glClearColor(0.3,0.3, 0.3, 0.3);
}

void blocks(int value){
glBegin(GL_LINE_STRIP);
	
	//front phase
	glColor3f(1.0,0.0,0.0);
	glVertex3f(0,0,12);
	glVertex3f(1,0,12);
	glVertex3f(1,1,12);
	glVertex3f(0,1,12);
	glVertex3f(0,0,12);
	glEnd();
	

	//back phase
	glBegin(GL_LINE_STRIP);
	glColor3f(1.0,0.0,0.0);
	glVertex3f(0,0,11);
	glVertex3f(1,0,11);
	glVertex3f(1,1,11);
	glVertex3f(0,1,11);
	glVertex3f(0,0,11);
	glEnd();

	//right phase
	
	glBegin(GL_LINE_STRIP);
	glColor3f(1.0,0.0,0.0);
	glVertex3f(1,1,12);
	glVertex3f(1,1,11);
	glVertex3f(1,0,11);
	glVertex3f(1,0,12);
	glVertex3f(1,1,12);
	glEnd();

	//left phase
	
	glBegin(GL_LINE_STRIP);
	glColor3f(1.0,0.0,0.0);
	glVertex3f(0,1,12);
	glVertex3f(0,1,11);
	glVertex3f(0,0,11);
	glVertex3f(0,0,12);
	glVertex3f(0,1,12);
	glEnd();
	
	
	glutPostRedisplay();


}



void blockOut(int value){

	
	
	//front wall
	glBegin(GL_LINE_STRIP);
	glColor3f(0.125, 0.698, 0.667);
	glVertex3f(0,0,0);
	glVertex3f(1,0,0);
    glVertex3f(1,1,0);
	glVertex3f(0,1,0);
	glVertex3f(0,0,0);
	glEnd();
	/////////walls
	for(int i=1;i<=12;i++)
	{
	
	glBegin(GL_LINE_STRIP);
	glColor3f(0.125, 0.698, 0.667);
	glVertex3f(0,0,i);
	glVertex3f(1,0,i);
    glVertex3f(1,1,i);
	glVertex3f(0,1,i);
	glVertex3f(0,0,i);
	glEnd();
	}
	

	///horizental lines of grid
    for(float i=.25;i<=.75;i=i+.25){
	glBegin(GL_LINE_STRIP);
	glColor3f(0.125, 0.698, 0.667);
	glVertex3f(0,i,0);
	glVertex3f(1,i,0);
	glEnd();
	}

	///vertical lines of grid
	  for(float i=.25;i<=.75;i=i+.25){
	glBegin(GL_LINE_STRIP);
	glColor3f(0.125, 0.698, 0.667);
	glVertex3f(i,0,0);
	glVertex3f(i,1,0);
	glEnd();
	  }
	
	/////////////////Left z lines
	  for(float i=0;i<=1;i=i+.25){
	glBegin(GL_LINE_STRIP);
	glColor3f(0.125, 0.698, 0.667);
	glVertex3f(0,i,0);
	glVertex3f(0,i,12);
	glEnd();
	  }
	//////////////////right lines
	    for(float i=.25;i<=.75;i=i+.25){
	glBegin(GL_LINE_STRIP);
	glColor3f(0.125, 0.698, 0.667);
	glVertex3f(1,i,0);
	glVertex3f(1,i,12);
	glEnd();
		}

	//////////////////bottom lines
		  for(float i=.25;i<=1;i=i+.25){
	glBegin(GL_LINE_STRIP);
	glColor3f(0.125, 0.698, 0.667);
	glVertex3f(i,0,0);
	glVertex3f(i,0,12);
	glEnd();}
	
	
	//////////////////top lines
		    for(float i=.25;i<=1;i=i+.25){
	glBegin(GL_LINE_STRIP);
    glColor3f(0.125, 0.698, 0.667);
	glVertex3f(i,1,0);
	glVertex3f(i,1,12);
	glEnd();}
	
	

	glutPostRedisplay();

}

void display(void)
{
	glClear(GL_COLOR_BUFFER_BIT);
	glColor3f(1.0, 1.0, 1.0);
	glLoadIdentity();
	gluLookAt(  0.5,0.5, 12.6, 
				0.5, 0.5, 0.0, 
				0.0, 1.0, 0.0);


	blockOut(1);
	blocks(1);
	glFlush();
}

void reshape(int w, int h)
{
	glViewport(0, 0, (GLsizei)w, (GLsizei)h);
	glMatrixMode(GL_PROJECTION);
	glLoadIdentity();
    gluPerspective(80, (GLfloat)w/(GLfloat) h, 0, 30);
	glMatrixMode(GL_MODELVIEW);
	glFlush();
}


int main(int argc, char** argv)
{
	glutInit(&argc, argv);
	glutInitDisplayMode(GLUT_SINGLE | GLUT_RGB);
	glutInitWindowSize(250, 250);
	glutInitWindowPosition(100,100);
	glutCreateWindow("Block Out");
	init();
	glutDisplayFunc(display);
	glutReshapeFunc(reshape);
	glutMainLoop();
	return 0;
}