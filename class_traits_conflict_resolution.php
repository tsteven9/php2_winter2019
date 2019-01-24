<?php

trait A
{

	public function smallSpeak()
    {
		echo 'a';
	}

	public function bigSpeak()
    {
		echo 'A';
	}

}

trait B
{

	public function smallSpeak()
    {
		echo 'b';
	}

	public function bigSpeak()
    {
		echo 'B';
	}

}

class Speaker
{

	use A, B {
		B::smallSpeak insteadof A;
		A::bigSpeak insteadof B;
	}

}

class Aliased_Speaker
{

	use A, B {
		B::smallSpeak insteadof A;
		A::bigSpeak insteadof B;
		B::bigSpeak as Speak;
	}

}