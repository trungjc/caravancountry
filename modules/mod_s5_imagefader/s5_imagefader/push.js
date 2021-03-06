/**
Script: Slideshow.Push.js
	Slideshow.Push - Push extension for Slideshow.

License:
	MIT-style license.

Copyright:
	Copyright (c) 2008 [Aeron Glemann](http://www.electricprism.com/aeron/).
	
Dependencies:
	Slideshow.
	Mootools 1.2 More: Fx.Elements.
*/

Slideshow.Push=new Class({Extends:Slideshow,initialize:function(A,B,C){C.overlap=true;this.parent(A,B,C);},_show:function(F){var I=[this.image,((this.counter%2)?this.a:this.b)];if(!this.image.retrieve('fx')){this.image.store('fx',new Fx.Elements(I,{'duration':this.options.duration,'link':'cancel','onStart':this._start.bind(this),'onComplete':this._complete.bind(this),'transition':this.options.transition}));}this.image.set('styles',{'left':'auto','right':'auto'}).setStyle(this.direction,this.width);var V={'0':{},'1':{}};V['0'][this.direction]=[this.width,0];V['1'][this.direction]=[0,-this.width];if(I[1].getStyle(this.direction)=='auto'){var W=this.W-I[1].W;I[1].set('styles',{'left':'auto','right':'auto'}).setStyle(this.direction,W);V['1'][this.direction]=[W,-this.width];}if(F){for(var P in V)V[P][this.direction]=V[P][this.direction][1];this.image.retrieve('fx').cancel().set(V);}else{this.image.retrieve('fx').start(V);}}});