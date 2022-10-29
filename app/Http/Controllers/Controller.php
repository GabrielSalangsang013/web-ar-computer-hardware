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
				'hardware_description' => 'A CPU cooler is device designed to draw heat away from the system CPU and other components in the enclosure. Using a CPU cooler to lower CPU temperatures improves efficiency and stability of the system. Adding a cooling device, however, can increase the overall noise level of the system.',
				'hardware_image' => '/images/internal_hardwares/cpu_cooler.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/y2ekQXYEbbs'
			]]);
		}

		if($hardwarename == 'cpu') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/cpu.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/cpu.usdz', 
				'hardware_name' => 'Processor Intel Core i9', 
				'hardware_description' => "CPU is short for Central Processing Unit. It is also known as a processor or microporcessor. It's one of the most important pieces of hardware in any digital computing system – if not the most important. Inside a CPU there are thousands of microscopic transistors, which are tiny switches that control the flow of electricity through the integrated circuits. You'll find the CPU located on a computer's motherboard. A computer's motherboard is the main circuit board inside a computer. Its job is to connect all hardware components together. Often referred to as the brain and heart of all digital systems, a CPU is responsible for doing all the work. It performs every single action a computer does and executes programs.",
				'hardware_image' => '/images/internal_hardwares/cpu.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/tbRC3dUo9h4'
			]]);
		}

		if($hardwarename == 'fan') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/fan.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/fan.usdz', 
				'hardware_name' => 'Lian Li UNI FAN', 
				'hardware_description' => 'A computer fan is any fan inside, or attached to, a computer case used for active cooling. Fans are used to draw cooler air into the case from the outside, expel warm air from inside and move air across a heat sink to cool a particular component. Both axial and sometimes centrifugal (blower/squirrel-cage) fans are used in computers.',
				'hardware_image' => '/images/internal_hardwares/fan.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/xdEqEGrbMkQ'
			]]);
		}

		if($hardwarename == 'gpu') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/gpu.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/gpu.usdz', 
				'hardware_name' => 'Graphics Card Unit', 
				'hardware_description' => "A Graphics Processing Unit (GPU) is a chip or electronic circuit capable of rendering graphics for display on an electronic device. The GPU was introduced to the wider market in 1999 and is best known for its use in providing the smooth graphics that consumers expect in modern videos and games.",
				'hardware_image' => '/images/internal_hardwares/gpu.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/LfdK-v0SbGI'
			]]);
		}

		if($hardwarename == 'hard_drive') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/hard_drive.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/hard_drive.usdz', 
				'hardware_name' => 'WD Hard Drive', 
				'hardware_description' => "A computer hard drive (or a hard disk or HDD) is one kind of technology that stores the operating system, applications, and data files such a documents, pictures and music that your computer uses. The rest of the components in your computer work together to show you the applications and files stored on your hard drive.",
				'hardware_image' => '/images/internal_hardwares/hard_drive.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/io2CrCm9f0I'
			]]);
		}

		if($hardwarename == 'motherboard') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/motherboard.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/motherboard.usdz', 
				'hardware_name' => 'ASUS z370-e', 
				'hardware_description' => "A motherboard is one of the most essential parts of a computer system. It holds together many of the crucial components of a computer, including the central processing unit (CPU), memory and connectors for input and output devices. The base of a motherboard consists of a very firm sheet of non-conductive material, typically some sort of rigid plastic. Thin layers of copper or aluminum foil, referred to as traces, are printed onto this sheet. These traces are very narrow and form the circuits between the various components. In addition to circuits, a motherboard contains a number of sockets and slots to connect the other components.",
				'hardware_image' => '/images/internal_hardwares/motherboard.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/B-gHA6sI5n8'
			]]);
		}

		if($hardwarename == 'nic') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/nic.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/nic.usdz', 
				'hardware_name' => 'Network Interface Card', 
				'hardware_description' => "A network interface card (NIC) is a hardware component, typically a circuit board or chip, which is installed on a computer so it can connect to a network.",
				'hardware_image' => '/images/internal_hardwares/nic.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/oo-tn17rUBo'
			]]);
		}

		if($hardwarename == 'power_supply') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/power_supply.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/power_supply.usdz', 
				'hardware_name' => 'Power Supply Unit', 
				'hardware_description' => "A Power Supply Unit (PSU) is an internal IT hardware component. Despite the name, Power Supply Units (PSU) do not supply systems with power - instead they convert it. Specifically, a power supply converts the alternating high voltage current (AC) into direct current (DC), and they also regulate the DC output voltage to the fine tolerances required for modern computing components.",
				'hardware_image' => '/images/internal_hardwares/power_supply.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/ZW1wcoERoDU'
			]]);
		}

		if($hardwarename == 'ram') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/ram.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/ram.usdz', 
				'hardware_name' => 'Random Access Memory', 
				'hardware_description' => "Alternatively referred to as main memory, primary memory, or system memory, RAM (random-access memory) is a hardware device that allows information to be stored and retrieved on a computer. RAM is usually associated with DRAM, which is a type of memory module. Because data is accessed randomly instead of sequentially like it is on a CD or hard drive, access times are much faster. However, unlike ROM, RAM is a volatile memory and requires power to keep the data accessible. If the computer is turned off, all data contained in RAM is lost.",
				'hardware_image' => '/images/internal_hardwares/ram.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/-aQOv3T7P8E'
			]]);
		}

		if($hardwarename == 'sound_card') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/sound_card.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/sound_card.usdz', 
				'hardware_name' => 'Sound Card', 
				'hardware_description' => "Alternatively referred to as an audio output device, sound board, or audio card. A sound card is an expansion card or IC for producing sound on a computer that can be heard through speakers or headphones. Although the computer doesn't need a sound card, it's included on every machine as either in an expansion slot (shown below) or built into the motherboard (onboard).",
				'hardware_image' => '/images/internal_hardwares/sound_card.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/SFBvvlebSmw'
			]]);
		}

		if($hardwarename == 'ssd') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/ssd.glb', 
				'hardware_url_ios' => '/models/internal_hardwares/ssd.usdz', 
				'hardware_name' => 'Solid State Drive', 
				'hardware_description' => "SSD is a storage medium that uses non-volatile memory to hold and access data. Unlike a hard drive, an SSD has no moving parts, which gives it advantages, such as faster access time, noiseless operation, higher reliability, and lower power consumption.",
				'hardware_image' => '/images/internal_hardwares/ssd.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/aa5l8uof_j0'
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
				'hardware_description' => "A digital camera is a hardware device that takes photographs and stores the image as data on a memory card. Unlike an analog camera, which exposes film chemicals to light, a digital camera uses digital optical components to register the intensity and color of light, and converts it into pixel data. Many digital cameras are capable of recording video in addition to taking photos.",
				'hardware_image' => '/images/external_hardwares/digital_camera.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/OaWsnJh8Xtk'
			]]);
		}

		if($hardwarename == 'external_hard_drive') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/external_hard_drive.glb', 
				'hardware_url_ios' => '/models/external_hardwares/external_hard_drive.usdz', 
				'hardware_name' => 'External Hard Drive', 
				'hardware_description' => "An external hard drive is a portable storage device that can be attached to a computer through a USB or FireWire connection, or wirelessly. External hard drives typically have high storage capacities and are often used to back up computers or serve as a network drive.",
				'hardware_image' => '/images/external_hardwares/external_hard_drive.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/Fl8ImWZeXxs'
			]]);
		}

		if($hardwarename == 'joystick') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/joystick.glb', 
				'hardware_url_ios' => '/models/external_hardwares/joystick.usdz', 
				'hardware_name' => 'Joystick', 
				'hardware_description' => "A joystick is an input device that can be used for controlling the movement of the cursor or a pointer in a computer device. The pointer/cursor movement is controlled by maneuvering a lever on the joystick. The input device is mostly used for gaming applications and, sometimes, in graphics applications. A joystick also can be helpful as an input device for people with movement disabilities.",
				'hardware_image' => '/images/external_hardwares/joystick.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/R1aApvrAAn4'
			]]);
		}

		if($hardwarename == 'keyboard') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/keyboard.glb', 
				'hardware_url_ios' => '/models/external_hardwares/keyboard.usdz', 
				'hardware_name' => 'Keyboard', 
				'hardware_description' => "A keyboard is one of the primary input devices used with a computer. Similar to an electric typewriter, a keyboard is composed of buttons used to create letters, numbers, and symbols, and perform additional functions. The following sections provide more in-depth information and answers to some of the frequently asked questions about the keyboard.",
				'hardware_image' => '/images/external_hardwares/keyboard.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/g2SiyJVFcDI'
			]]);
		}

		if($hardwarename == 'mic') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/mic.glb', 
				'hardware_url_ios' => '/models/external_hardwares/mic.usdz', 
				'hardware_name' => 'Microphone', 
				'hardware_description' => "Sometimes abbreviated as mic, a microphone is a hardware peripheral and input device originally invented by Emile Berliner in 1877. A microphone allows computer users to input audio into their computers.",
				'hardware_image' => '/images/external_hardwares/mic.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/d_crXXbuEKE'
			]]);
		}

		if($hardwarename == 'monitor_lcd') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/monitor_lcd.glb', 
				'hardware_url_ios' => '/models/external_hardwares/monitor_lcd.usdz', 
				'hardware_name' => 'Monitor (LCD)', 
				'hardware_description' => "A monitor is an electronic visual computer display that includes a screen, circuitry and the case in which that circuitry is enclosed. Older computer monitors made use of cathode ray tubes (CRT), which made them large, heavy and inefficient. Nowadays, flat-screen LCD monitors are used in devices like laptops, PDAs and desktop computers because they are lighter and more energy efficient. A monitor is also known as a screen or a visual display unit (VDU).",
				'hardware_image' => '/images/external_hardwares/monitor_lcd.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/LaqeGAXkIsE'
			]]);
		}

		if($hardwarename == 'monitor_crt') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/monitor_crt.glb', 
				'hardware_url_ios' => '/models/external_hardwares/monitor_crt.usdz', 
				'hardware_name' => 'Monitor (CRT)', 
				'hardware_description' => "A monitor is an electronic visual computer display that includes a screen, circuitry and the case in which that circuitry is enclosed. Older computer monitors made use of cathode ray tubes (CRT), which made them large, heavy and inefficient. Nowadays, flat-screen LCD monitors are used in devices like laptops, PDAs and desktop computers because they are lighter and more energy efficient. A monitor is also known as a screen or a visual display unit (VDU).",
				'hardware_image' => '/images/external_hardwares/monitor_crt.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/LaqeGAXkIsE'
			]]);
		}

		if($hardwarename == 'mouse') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/mouse.glb', 
				'hardware_url_ios' => '/models/external_hardwares/mouse.usdz', 
				'hardware_name' => 'Mouse', 
				'hardware_description' => "A computer mouse is a handheld hardware input device that controls a cursor in a GUI (graphical user interface) for pointing, moving and selecting text, icons, files, and folders on your computer. In addition to these functions, a mouse can also be used to drag-and-drop objects and give you access to the right-click menu. For desktop computers, the mouse is placed on a flat surface (e.g., mouse pad or desk) in front of your computer.",
				'hardware_image' => '/images/external_hardwares/mouse.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/oobt4TmEJ8U'
			]]);
		}

		if($hardwarename == 'plotter') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/plotter.glb', 
				'hardware_url_ios' => '/models/external_hardwares/plotter.usdz', 
				'hardware_name' => 'Plotter', 
				'hardware_description' => "A plotter is a computer hardware device much like a printer that is used for printing vector graphics. Instead of toner, plotters use a pen, pencil, marker, or another writing tool to draw multiple, continuous lines on paper rather than multiple dots, like a traditional printer. Plotters produce a hard copy of schematics and other similar applications. Though once widely used for computer-aided design, these devices were more or less phased out by wide-format printers.",
				'hardware_image' => '/images/external_hardwares/plotter.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/kZLb9kvqRWI'
			]]);
		}

		if($hardwarename == 'printer') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/printer.glb', 
				'hardware_url_ios' => '/models/external_hardwares/printer.usdz', 
				'hardware_name' => 'Printer', 
				'hardware_description' => "A printer is an external hardware output device that takes the electronic data stored on a computer or other device and generates a hard copy. For example, if you created a report on your computer, you could print several copies to hand out at a staff meeting. Printers are one of the most popular computer peripherals and are commonly used to print text and photos.",
				'hardware_image' => '/images/external_hardwares/printer.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/A_a9eFN-qLc'
			]]);
		}

		if($hardwarename == 'projector') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/projector.glb', 
				'hardware_url_ios' => '/models/external_hardwares/projector.usdz', 
				'hardware_name' => 'Projector', 
				'hardware_description' => "Projector is a device that takes images generated by a computer or Blu-ray player and reproduce them by projection onto a screen, wall, or another surface. In most cases, the surface projected onto is large, flat, and lightly colored. For example, you could use a projector to show a presentation on a large screen so that everyone in the room can see it. Projectors can produce either still (slides) or moving images (videos). A projector is often about the size of a toaster and weighs only a few pounds.",
				'hardware_image' => '/images/external_hardwares/projector.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/FM-M1PjAD88'
			]]);
		}

		if($hardwarename == 'sd_card') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/sd_card.glb', 
				'hardware_url_ios' => '/models/external_hardwares/sd_card.usdz', 
				'hardware_name' => 'SD Card', 
				'hardware_description' => "Short for Secure Digital card, the SD card is one of the more common types of memory cards used with electronics. The SD technology is used by over 400 brands of electronic equipment and over 8000 different models, including digital cameras and cell phones. It is considered the industry standard due to the wide use.",
				'hardware_image' => '/images/external_hardwares/sd_card.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/zQYIcxYXafc'
			]]);
		}

		if($hardwarename == 'speaker') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/speaker.glb', 
				'hardware_url_ios' => '/models/external_hardwares/speaker.usdz', 
				'hardware_name' => 'Speaker', 
				'hardware_description' => "Computer speaker is an hardware device that connects to a computer to generate sound. The signal used to produce the sound that comes from a computer speaker is created by the computer's sound card.",
				'hardware_image' => '/images/external_hardwares/speaker.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/BHPg2UnbIe4'
			]]);
		}

		if($hardwarename == 'trackball') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/trackball.glb', 
				'hardware_url_ios' => '/models/external_hardwares/trackball.usdz', 
				'hardware_name' => 'Trackball', 
				'hardware_description' => "The trackball is an input device that may resemble an 'upside-down' mouse or a mouse on its side. Unlike a mechanical mouse ball that rolls along the desk surface, a trackball is on the top or side of the mouse. This positioning lets the user to rotate the ball in two dimensions with their fingers or thumb, controlling the on-screen pointer without physically moving the whole mouse. A trackball requires less arm and wrist motion than a regular mouse and therefore is often less stressful for the user to operate, helping to prevent RSI.",
				'hardware_image' => '/images/external_hardwares/trackball.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/Lzk1Hfd0Dmk'
			]]);
		}

		if($hardwarename == 'usb_card_reader') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/usb_card_reader.glb', 
				'hardware_url_ios' => '/models/external_hardwares/usb_card_reader.usdz', 
				'hardware_name' => 'USB Card Reader', 
				'hardware_description' => "A memory card reader (also known as a USB card reader and an SD card reader) is a small device that is used to access, read, copy and backup data from a wide variety of memory cards such as SD (Secure Digital), CF (CompactFlash), MMC (MultiMediaCardC) and others.",
				'hardware_image' => '/images/external_hardwares/usb_card_reader.jpg',
				'hardware_video' => 'https://www.youtube.com/embed/f8T_E4RCvUc'
			]]);
		}

		// END INTERNAL HARDWARE DEVICES

		return abort(404);
	}
}
