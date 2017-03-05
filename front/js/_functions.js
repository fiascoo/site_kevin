@function set_color($color){

	@if(lightness($color) > 50){

		@return #000000;
	}@else{
		
		@return #ffffff;

	}
}