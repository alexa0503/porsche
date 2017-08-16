package
{ 
	public class main 
	{
		public var state:int; //×´Ì¬»ú 
		public function main() 
		{
			this.state=0;
			SiteEvt.add(enumID.onorientationonchange,this.onorientationonchange,this);
			SiteEvt.add(enumID.onresize,this.onresize,this);
			this.onresize();
		}
		public function onresize(e:Evt)
		{
		}
		public function onorientationonchange(e:Evt) 
		{
		}
	}
}
