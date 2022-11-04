<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        if(Auth::check()){
    		return redirect("dashboard");
    	}

        return view('index');
    }

    public function dashboard(){
    	return view("dashboard");
    }

	public function logout() {
		Auth::logout();
    	return redirect()->route('login');
    }

    public function googleLogin(Request $request){
    	$checkUser = User::where('social_id',$request->uid)->first();

    	if($checkUser){
    		$checkUser->social_id = $request->uid;
    		$checkUser->full_name = $request->displayName;
    		$checkUser->image = $request->photoURL;
    		$checkUser->email = $request->email;
    		$checkUser->save();
    		Auth::loginUsingId($checkUser->id, true);
    		return response()->json([
    			"status" => "success"
    		]);

    	}else{
    		$user = new User;
    		$user->social_id = $request->uid;
    		$user->full_name = $request->displayName;
    		$user->image = $request->photoURL;
    		$user->email = $request->email;
    		$user->user_type = "google";
    		$user->save();
    		Auth::loginUsingId($user->id, true);
    		return response()->json([
    			"status" => "success"
    		]);
    	}
    }

	public function internal_hardware() {
		return view('internalhardware');
	}

	public function external_hardware() {
		return view('externalhardware');
	}

	public function internal_hardware_device($hardwarename) {

		// START INTERNAL HARDWARE DEVICES
		if($hardwarename == 'cpu_cooler') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/cpu_cooler.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/cpu_cooler.usdz', 
				'hardware_name' => 'AMD Ryzen CPU Cooler', 
				'hardware_description' => "A CPU cooler is a device made to remove heat from the system CPU and other enclosure components. Lowering CPU temperatures using a CPU cooler enhances computer performance and stability. However, including a cooling device may raise the system's total noise level.",
				'hardware_image' => '/images/internal_hardwares/cpu_cooler.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/y2ekQXYEbbs',
				'hardware_ref_text' => 'https://www.webopedia.com/definitions/cpu-cooler/',
				'hardware_ref_image' => 'https://lzd-img-global.slatic.net/g/p/7fe8db12ee8cb84b698258d5cf748d11.jpg_720x720q80.jpg_.webp',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=y2ekQXYEbbs'
			]]);
		}

		if($hardwarename == 'cpu') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/cpu.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/cpu.usdz', 
				'hardware_name' => 'Processor Intel Core i9', 
				'hardware_description' => "The Central Processing Unit is abbreviated as CPU. It is sometimes referred to as a microprocessor or processor. It's one of, if not the most, crucial pieces of hardware in every digital computer system. Numerous minuscule transistors, which act as tiny switches to regulate the flow of energy through integrated circuits, are found inside a CPU. The CPU is found on the motherboard of a computer. The motherboard of a computer is its primary circuit board. Its responsibility is to link all hardware pieces together. A CPU does all work and is sometimes referred to as the brain and heart of all digital systems. It runs instructions and carries out every single task a computer carries out.",
				'hardware_image' => '/images/internal_hardwares/cpu.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/tbRC3dUo9h4',
				'hardware_ref_text' => 'https://www.freecodecamp.org/news/what-is-cpu-meaning-definition-and-what-cpu-stands-for/#:~:text=CPU%20is%20short%20for%20Central,if%20not%20the%20most%20important.',
				'hardware_ref_image' => 'https://i.pcmag.com/imagery/reviews/075s7sVk2yE6LbE8KspfTeu-39.fit_scale.size_760x427.v1569481249.jpg',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=tbRC3dUo9h4'
			]]);
		}

		if($hardwarename == 'fan') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/fan.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/fan.usdz', 
				'hardware_name' => 'Lian Li UNI FAN', 
				'hardware_description' => 'A computer fan is a fan used for active cooling that is located inside or connected to a computer casing. To cool a specific component, fans are utilized to circulate air across a heat sink, pull cooler air from the outside into the case, and exhaust warm air from within. Computers employ axial and occasionally centrifugal (blower/squirrel-cage) fans.',
				'hardware_image' => '/images/internal_hardwares/fan.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/xdEqEGrbMkQ',
				'hardware_ref_text' => 'https://en.wikipedia.org/wiki/Computer_fan',
				'hardware_ref_image' => 'https://lian-li.com/wp-content/uploads/2021/06/al120_03.jpg',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=xdEqEGrbMkQ'
			]]);
		}

		if($hardwarename == 'gpu') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/gpu.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/gpu.usdz', 
				'hardware_name' => 'Graphics Card Unit', 
				'hardware_description' => "A chip or electrical circuit known as a graphics processing unit (GPU) is able to produce graphics for display on an electronic device. The GPU was first made available to the general public in 1999, and it is most recognized for being used to produce the fluid visuals that customers anticipate in contemporary movies and video games.",
				'hardware_image' => '/images/internal_hardwares/gpu.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/LfdK-v0SbGI',
				'hardware_ref_text' => 'https://www.investopedia.com/terms/g/graphics-processing-unit-gpu.asp',
				'hardware_ref_image' => 'https://m.media-amazon.com/images/I/61AZBIL4+2L._AC_SL1500_.jpg',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=LfdK-v0SbGI'
			]]);
		}

		if($hardwarename == 'hard_drive') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/hard_drive.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/hard_drive.usdz', 
				'hardware_name' => 'WD Hard Drive', 
				'hardware_description' => "Your computer's operating system, software, and data files, including documents, images, and music, are all stored on a hard drive, often known as a hard disk or HDD. The remaining parts of your computer cooperate to display the programs and files on your hard disk.",
				'hardware_image' => '/images/internal_hardwares/hard_drive.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/io2CrCm9f0I',
				'hardware_ref_text' => 'https://www.crucial.com/articles/pc-builders/what-is-a-hard-drive',
				'hardware_ref_image' => 'https://i0.wp.com/www.partsourceonline.com/wp-content/uploads/2019/02/WD800JD__18382.gif?fit=400%2C400&ssl=1',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=io2CrCm9f0I'
			]]);
		}

		if($hardwarename == 'motherboard') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/motherboard.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/motherboard.usdz', 
				'hardware_name' => 'ASUS z370-e', 
				'hardware_description' => "One of the most crucial components of a computer is the motherboard. It holds together a lot of the essential parts of a computer, such as the memory, connections for input and output devices, and the central processor unit (CPU). A highly stiff layer of non-conductive material, usually hard plastic, serves as the motherboard's basis. Traces—thin layers of copper or aluminum foil—are imprinted on this sheet. These traces, which connect the various components, are quite thin. A motherboard also has a number of connectors and slots for connecting additional components.",
				'hardware_image' => '/images/internal_hardwares/motherboard.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/B-gHA6sI5n8',
				'hardware_ref_text' => 'https://study.com/academy/lesson/what-is-a-motherboard-definition-function-diagram.html#:~:text=A%20motherboard%20is%20one%20of,for%20input%20and%20output%20devices.',
				'hardware_ref_image' => 'https://cdn.mos.cms.futurecdn.net/aaP328Vx83UFVUJEUsTDAE-1200-80.jpg',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=B-gHA6sI5n8'
			]]);
		}

		if($hardwarename == 'nic') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/nic.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/nic.usdz', 
				'hardware_name' => 'Network Interface Card', 
				'hardware_description' => "A network interface card (NIC) is a piece of hardware, often a chip or circuit board, that is inserted on a computer to enable network connectivity.",
				'hardware_image' => '/images/internal_hardwares/nic.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/oo-tn17rUBo',
				'hardware_ref_text' => 'https://www.techtarget.com/searchnetworking/definition/network-interface-card',
				'hardware_ref_image' => 'https://s3.ap-south-1.amazonaws.com/afteracademy-server-uploads/what-is-nic-network-interface-card-wired-network-interface-card-6e4b918325e615a4.jpg',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=oo-tn17rUBo'
			]]);
		}

		if($hardwarename == 'power_supply') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/power_supply.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/power_supply.usdz', 
				'hardware_name' => 'Power Supply Unit', 
				'hardware_description' => "An internal piece of IT hardware is known as a power supply unit (PSU). Despite their name, power conversion devices, or PSUs, do not really deliver power to systems. A power supply specifically transforms alternating high voltage current (AC) to direct current (DC) and regulates the DC output voltage to the precise tolerances needed for contemporary computer components.",
				'hardware_image' => '/images/internal_hardwares/power_supply.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/ZW1wcoERoDU',
				'hardware_ref_text' => 'https://www.techbuyer.com/uk/blog/What-is-a-Power-Supply-Unit-PSU',
				'hardware_ref_image' => 'https://m.media-amazon.com/images/I/51FWwux-SML._AC_SY450_.jpg',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=ZW1wcoERoDU'
			]]);
		}

		if($hardwarename == 'ram') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/ram.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/ram.usdz', 
				'hardware_name' => 'Random Access Memory', 
				'hardware_description' => "Random-access memory (RAM), often known as main memory, primary memory, or system memory, is a piece of hardware that enables the storing and retrieval of data on a computer. DRAM is a kind of memory module, and RAM is frequently related to it. Access times are greatly accelerated since data is randomly accessible rather than sequentially as it is on a CD or hard disk. RAM is a volatile memory, in contrast to ROM, and needs electricity to maintain the data accessible. All information in RAM is lost if the computer is switched off.",
				'hardware_image' => '/images/internal_hardwares/ram.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/-aQOv3T7P8E',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/r/ram.htm#:~:text=Alternatively%20referred%20to%20as%20main,a%20type%20of%20memory%20module.',
				'hardware_ref_image' => 'https://cf.shopee.ph/file/aa260a8b7a3c1711630e7a9995c6c1df',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=-aQOv3T7P8E'
			]]);
		}

		if($hardwarename == 'sound_card') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/sound_card.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/sound_card.usdz', 
				'hardware_name' => 'Sound Card', 
				'hardware_description' => "Sometimes known as an audio card, sound board, or audio output device. An expansion card or IC known as a sound card is used by computers to generate sound that may be heard through speakers or headphones. Even though a sound card isn't necessary, every computer has one either integrated into the motherboard or in an expansion slot (as seen below) (onboard).",
				'hardware_image' => '/images/internal_hardwares/sound_card.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/SFBvvlebSmw',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/s/souncard.htm#:~:text=Alternatively%20referred%20to%20as%20an,heard%20through%20speakers%20or%20headphones.',
				'hardware_ref_image' => 'https://asapguide.com/wp-content/uploads/2020/03/Sound-Card-1200x720.jpg',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=SFBvvlebSmw'
			]]);
		}

		if($hardwarename == 'ssd') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/ssd.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/ssd.usdz', 
				'hardware_name' => 'Solid State Drive', 
				'hardware_description' => "SSD is a storage media that accesses and stores data using non-volatile memory. An SSD provides benefits such as quicker access times, noiseless operation, improved durability, and reduced power consumption because it doesn't have moving components as a hard drive does.",
				'hardware_image' => '/images/internal_hardwares/ssd.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/aa5l8uof_j0',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/s/ssd.htm#:~:text=Short%20for%20solid%2Dstate%20drive,reliability%2C%20and%20lower%20power%20consumption.',
				'hardware_ref_image' => 'https://c1.neweggimages.com/ProductImageCompressAll1280/20-250-088-V03.jpg',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=aa5l8uof_j0'
			]]);
		}
		// END INTERNAL HARDWARE DEVICES

		return abort(404);
	}


	public function external_hardware_device($hardwarename) {

		// START INTERNAL HARDWARE DEVICES
		if($hardwarename == 'digital_camera') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/digital_camera.glb', 
				'hardware_url_ios' => '/models/external_hardwares/digital_camera.usdz', 
				'hardware_name' => 'Digital Camera', 
				'hardware_description' => "A digital camera is a hardware device that captures images and saves them as data to a memory card. A digital camera employs digital optical components to record the strength and color of light and turn it into pixel data, in contrast to an analog camera, which exposes film chemicals to light. In addition to shooting pictures, many digital cameras also have the ability to capture video.",
				'hardware_image' => '/images/external_hardwares/digital_camera.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/OaWsnJh8Xtk',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/d/digicame.htm#:~:text=A%20digital%20camera%20is%20a,converts%20it%20into%20pixel%20data.',
				'hardware_ref_image' => 'https://www.cameralabs.com/wp-content/uploads/2014/11/Sigma_DP1_front-1440x838.jpg',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=OaWsnJh8Xtk'
			]]);
		}

		if($hardwarename == 'external_hard_drive') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/external_hard_drive.glb', 
				'hardware_url_ios' => '/models/external_hardwares/external_hard_drive.usdz', 
				'hardware_name' => 'External Hard Drive', 
				'hardware_description' => "A portable storage device known as an external hard drive can be wirelessly or through a USB or FireWire connection connected to a computer. External hard drives sometimes have large storage capabilities and are used as network drives or to back up systems.",
				'hardware_image' => '/images/external_hardwares/external_hard_drive.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/Fl8ImWZeXxs',
				'hardware_ref_text' => 'https://www.techtarget.com/whatis/definition/external-hard-drive#:~:text=An%20external%20hard%20drive%20is,serve%20as%20a%20network%20drive.',
				'hardware_ref_image' => 'https://d1rlzxa98cyc61.cloudfront.net/catalog/product/cache/1801c418208f9607a371e61f8d9184d9/1/7/176568_2020.jpg',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=Fl8ImWZeXxs'
			]]);
		}

		if($hardwarename == 'joystick') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/joystick.glb', 
				'hardware_url_ios' => '/models/external_hardwares/joystick.usdz', 
				'hardware_name' => 'Joystick', 
				'hardware_description' => "A joystick is an input device that may be used to manage the movement of a computer device's cursor or pointer. The joystick has a lever that may be used to control the pointer/cursor movement. The input device is mostly used for gaming applications, though occasionally graphical ones as well. For those with movement disorders, a joystick might be useful as an input device.",
				'hardware_image' => '/images/external_hardwares/joystick.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/R1aApvrAAn4',
				'hardware_ref_text' => 'https://www.techopedia.com/definition/31108/joystick#:~:text=A%20joystick%20is%20an%20input,%2C%20sometimes%2C%20in%20graphics%20applications.',
				'hardware_ref_image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Atari-2600-Joystick.jpg/1200px-Atari-2600-Joystick.jpg',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=R1aApvrAAn4'
			]]);
		}

		if($hardwarename == 'keyboard') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/keyboard.glb', 
				'hardware_url_ios' => '/models/external_hardwares/keyboard.usdz', 
				'hardware_name' => 'Keyboard', 
				'hardware_description' => "One of the main input methods for computers is the keyboard. A keyboard is made up of buttons that may be used to produce letters, numbers, and symbols as well as carry out other tasks, much like an electronic typewriter. More in-depth details and responses to some commonly asked questions concerning the keyboard are provided in the sections that follow.",
				'hardware_image' => '/images/external_hardwares/keyboard.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/g2SiyJVFcDI',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/k/keyboard.htm',
				'hardware_ref_image' => 'https://m.media-amazon.com/images/I/61Nt8geXzWL._AC_SL1500_.jpg',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=g2SiyJVFcDI'
			]]);
		}

		if($hardwarename == 'mic') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/mic.glb', 
				'hardware_url_ios' => '/models/external_hardwares/mic.usdz', 
				'hardware_name' => 'Microphone', 
				'hardware_description' => "A microphone, also shortened to 'mic,' is a hardware input and peripheral device created by Emile Berliner in 1877. Computer users may enter sounds into their computers via a microphone.",
				'hardware_image' => '/images/external_hardwares/mic.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/d_crXXbuEKE',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/m/microphone.htm',
				'hardware_ref_image' => 'http://cdn.shopify.com/s/files/1/0355/8296/7943/products/main_3e67f988-a575-4f50-a786-c670a001c1de_1024x.jpg?v=1617087679',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=d_crXXbuEKE'
			]]);
		}

		if($hardwarename == 'monitor_lcd') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/monitor_lcd.glb', 
				'hardware_url_ios' => '/models/external_hardwares/monitor_lcd.usdz', 
				'hardware_name' => 'Monitor (LCD)', 
				'hardware_description' => "An electrical visual computer display known as a monitor consists of a screen, circuitry, and the housing for that equipment. Cathode ray tubes (CRT) were used in older computer monitors, which made them bulky, heavy, and ineffective. Since they are lighter and more energy-efficient, flat-screen LCD displays are now found in gadgets like laptops, PDAs, and desktop PCs. Another name for a monitor is a screen or a visual display device (VDU).",
				'hardware_image' => '/images/external_hardwares/monitor_lcd.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/LaqeGAXkIsE',
				'hardware_ref_text' => 'https://www.techopedia.com/definition/3185/monitor#:~:text=Techopedia%20Explains%20Monitor-,What%20Does%20Monitor%20Mean%3F,them%20large%2C%20heavy%20and%20inefficient.',
				'hardware_ref_image' => 'https://cf.shopee.ph/file/ff3ac2d5d6ac7b89e3a918098eb9b085',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=LaqeGAXkIsE'
			]]);
		}

		if($hardwarename == 'monitor_crt') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/monitor_crt.glb', 
				'hardware_url_ios' => '/models/external_hardwares/monitor_crt.usdz', 
				'hardware_name' => 'Monitor (CRT)', 
				'hardware_description' => "An electrical visual computer display known as a monitor consists of a screen, circuitry, and the housing for that equipment. Cathode ray tubes (CRT) were used in older computer monitors, which made them bulky, heavy, and ineffective. Since they are lighter and more energy-efficient, flat-screen LCD displays are now found in gadgets like laptops, PDAs, and desktop PCs. Another name for a monitor is a screen or a visual display device (VDU).",
				'hardware_image' => '/images/external_hardwares/monitor_crt.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/LaqeGAXkIsE',
				'hardware_ref_text' => 'https://www.techopedia.com/definition/3185/monitor#:~:text=Techopedia%20Explains%20Monitor-,What%20Does%20Monitor%20Mean%3F,them%20large%2C%20heavy%20and%20inefficient.',
				'hardware_ref_image' => 'https://www.online-tech-tips.com/wp-content/uploads/2019/09/cropped-crt-monitor.jpeg',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=LaqeGAXkIsE'
			]]);
		}

		if($hardwarename == 'mouse') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/mouse.glb', 
				'hardware_url_ios' => '/models/external_hardwares/mouse.usdz', 
				'hardware_name' => 'Mouse', 
				'hardware_description' => "A computer mouse is a portable hardware input tool used for pointing, moving, and selecting text, icons, files, and folders on a computer's graphical user interface (GUI). A mouse may also be used to drag and drop things and provide you access to the right-click menu in addition to these features. The mouse is set up in front of desktop computers on a flat surface, such as a desk or mouse pad.",
				'hardware_image' => '/images/external_hardwares/mouse.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/oobt4TmEJ8U',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/m/mouse.htm',
				'hardware_ref_image' => 'https://lzd-img-global.slatic.net/g/p/88cf30012f2833d6618d20411e914c08.jpg_720x720q80.jpg_.webp',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=oobt4TmEJ8U'
			]]);
		}

		if($hardwarename == 'plotter') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/plotter.glb', 
				'hardware_url_ios' => '/models/external_hardwares/plotter.usdz', 
				'hardware_name' => 'Plotter', 
				'hardware_description' => "A plotter is a piece of computer gear, similar to a printer, used to produce vector graphics. Plotters create several, continuous lines on paper as opposed to numerous dots, as is the case with conventional printers, using a pen, pencil, marker, or other writing instrument as opposed to toner. Schematics and other comparable applications are printed using plotters. These tools were originally often used for computer-aided design, but wide-format printers mostly replaced them.",
				'hardware_image' => '/images/external_hardwares/plotter.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/kZLb9kvqRWI',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/p/plotter.htm',
				'hardware_ref_image' => 'https://m.media-amazon.com/images/I/71PAiSDGJHL._AC_SL1500_.jpg',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=kZLb9kvqRWI'
			]]);
		}

		if($hardwarename == 'printer') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/printer.glb', 
				'hardware_url_ios' => '/models/external_hardwares/printer.usdz', 
				'hardware_name' => 'Printer', 
				'hardware_description' => "An external hardware output device known as a printer converts digital data stored on a computer or other device into a physical copy. You may print numerous copies of a report you produced on your computer, for instance, and distribute them during a staff meeting. One of the most well-liked computer accessories, printers are frequently used to print text and images.",
				'hardware_image' => '/images/external_hardwares/printer.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/A_a9eFN-qLc',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/p/printer.htm',
				'hardware_ref_image' => 'https://mediaserver.goepson.com/ImConvServlet/imconv/ea90ccf617c56c9219bf6f6de3c413d90619048b/1200Wx1200H?use=banner&hybrisId=B2C&assetDescr=et4750_hero_690x460',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=A_a9eFN-qLc'
			]]);
		}

		if($hardwarename == 'projector') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/projector.glb', 
				'hardware_url_ios' => '/models/external_hardwares/projector.usdz', 
				'hardware_name' => 'Projector', 
				'hardware_description' => "A projector is an output device that reproduces images by projecting them onto a screen, wall, or other surface using images created by a computer or Blu-ray player. The surface that is projected upon is often big, flat, and softly colored. To ensure that everyone in the room can view a presentation, you may, for instance, utilize a projector to display it on a wide screen. Moving or motionless pictures can be produced via projectors (slides) (videos). A projector often has the same size and weight as a toaster.",
				'hardware_image' => '/images/external_hardwares/projector.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/FM-M1PjAD88',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/p/projecto.htm#:~:text=A%20projector%20is%20an%20output,%2C%20flat%2C%20and%20lightly%20colored.',
				'hardware_ref_image' => 'https://mediaserver.goepson.com/ImConvServlet/imconv/ff8452a11c4a58dd71ce1b9f1ef8a3c0e858e554/1200Wx1200H?use=banner&hybrisId=B2C&assetDescr=X41_wbw_2_tif',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=FM-M1PjAD88'
			]]);
		}

		if($hardwarename == 'sd_card') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/sd_card.glb', 
				'hardware_url_ios' => '/models/external_hardwares/sd_card.usdz', 
				'hardware_name' => 'SD Card', 
				'hardware_description' => "One of the most popular memory card kinds used with electronics is the SD card, often known as a Secure Digital card. Over 8000 distinct kinds of electronic devices from over 400 different companies, including digital cameras and cell phones, employ the SD technology. Due of its widespread use, it is regarded as the industry standard.",
				'hardware_image' => '/images/external_hardwares/sd_card.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/zQYIcxYXafc',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/s/sdcard.htm',
				'hardware_ref_image' => 'https://lzd-img-global.slatic.net/g/p/74fb480701b37e49c3738f3f7798e88c.jpg_720x720q80.jpg_.webp',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=zQYIcxYXafc'
			]]);
		}

		if($hardwarename == 'speaker') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/speaker.glb', 
				'hardware_url_ios' => '/models/external_hardwares/speaker.usdz', 
				'hardware_name' => 'Speaker', 
				'hardware_description' => "A computer speaker is a piece of hardware used for audio output that is connected to a computer. The sound card in the computer generates the signal that is needed to generate the sound that emanates from a computer speaker. The Harman Kardon Soundsticks III 2.1 Channel Multimedia Speaker System is seen in the image.",
				'hardware_image' => '/images/external_hardwares/speaker.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/BHPg2UnbIe4',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/s/speaker.htm#:~:text=A%20computer%20speaker%20is%20an,2.1%20Channel%20Multimedia%20Speaker%20System.',
				'hardware_ref_image' => 'https://cdn.shopify.com/s/files/1/0217/5985/2608/products/000000_22180_grande.jpg?v=1594107385',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=BHPg2UnbIe4'
			]]);
		}

		if($hardwarename == 'trackball') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/trackball.glb', 
				'hardware_url_ios' => '/models/external_hardwares/trackball.usdz', 
				'hardware_name' => 'Trackball', 
				'hardware_description' => "The trackball is an input device that resembles a mouse turned sideways or upside down. A trackball is located on the top or side of the mouse, as opposed to a mechanical mouse ball that travels along the work surface. With the mouse not actually being moved, the user may control the on-screen pointer by rotating the ball in two dimensions with their fingers or thumb. A trackball helps avoid RSI since it involves less arm and wrist motion than a normal mouse and is frequently less unpleasant for the user to use.",
				'hardware_image' => '/images/external_hardwares/trackball.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/Lzk1Hfd0Dmk',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/t/trackbal.htm',
				'hardware_ref_image' => 'https://www.nsi-be.com/media/get/large/749/additional-usb-port___6061bc54aac2c___.jpg',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=Lzk1Hfd0Dmk'
			]]);
		}

		if($hardwarename == 'usb_card_reader') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/usb_card_reader.glb', 
				'hardware_url_ios' => '/models/external_hardwares/usb_card_reader.usdz', 
				'hardware_name' => 'USB Card Reader', 
				'hardware_description' => "A memory card reader is a compact device that is used to access, read, copy, and backup data from a variety of memory cards, including SD (Secure Digital), CF (CompactFlash), MMC (MultiMediaCardC), and others. It is sometimes referred to as a USB card reader and an SD card reader.",
				'hardware_image' => '/images/external_hardwares/usb_card_reader.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/f8T_E4RCvUc',
				'hardware_ref_text' => 'https://www.sysdevlabs.com/articles/additional-equipment/memory-card-reader/',
				'hardware_ref_image' => 'https://cf.shopee.ph/file/20ece23c26865ee2485379da1f537feb',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=f8T_E4RCvUc'
			]]);
		}

		// END INTERNAL HARDWARE DEVICES

		return abort(404);
	}
}
