all: gotojakarta

gotojakarta : go-to-jakarta.cpp stlastar.h
	g++ -Wall go-to-jakarta.cpp -o gotojakarta
