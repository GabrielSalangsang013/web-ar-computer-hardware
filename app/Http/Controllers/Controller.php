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
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/cpu_cooler.glb?sound=audio/internal_hardwares/cpu_cooler.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/cpu_cooler.usdz?sound=audio/internal_hardwares/cpu_cooler.ogg', 
				'hardware_name' => 'CPU Cooler', 
				'hardware_description' => "A CPU cooler is a device made to remove heat from the system CPU and other enclosure components. Lowering CPU temperatures using a CPU cooler enhances computer performance and stability. However, including a cooling device may raise the system's total noise level.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/cpu_fan_xwv4jt.png',
				'hardware_video' => 'https://www.youtube.com/embed/y2ekQXYEbbs',
				'hardware_ref_text' => 'https://www.webopedia.com/definitions/cpu-cooler/',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/cpu_fan_xwv4jt.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016122/images/internal_hardwares/cpu_fan_2_im1ppa.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016139/images/internal_hardwares/cpu_fan_3_k8fzcy.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=y2ekQXYEbbs',
				'hardware_name&specs' => '
				<table id="customers">
					<tr><th>Model Name</th><th>AMD Wraith Spire Cooler</th></tr>
					<tr><td>Brand</td><td>AMD</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-2" data-position="-0.022712493299865955m 0.03143387372029287m -0.008526865516891326m" data-normal="-0.58236632219289m -0.20769783481838966m -0.7859459753617165m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Fan</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-10" data-position="0.02001472336562969m 0.045080962773041265m -0.0007109515375109312m" data-normal="0.9999999999999076m 3.576278828631866e-7m 2.38418508047277e-7m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Heatsink</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/cpu_fan/cpu_fan_fan.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/cpu_fan/cpu_fan_heatsink.mp3',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'The computer processor is being cooled by this fan. It aids in removing hot air from the processor and blowing it away, keeping it cooler.',
				'hardware_caption_2' => 'This heat sink is a form of active cooling used to keep integrated circuits in computer systems, most often the central processing unit, at a safe temperature.',
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'cpu') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/cpu.glb?sound=audio/internal_hardwares/cpu.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/cpu.usdz?sound=audio/internal_hardwares/cpu.ogg', 
				'hardware_name' => 'Central Processing Unit (CPU)', 
				'hardware_description' => "The Central Processing Unit is abbreviated as CPU. It is sometimes referred to as a microprocessor or processor. It's one of, if not the most, crucial pieces of hardware in every digital computer system. Numerous minuscule transistors, which act as tiny switches to regulate the flow of energy through integrated circuits, are found inside a CPU. The CPU is found on the motherboard of a computer. The motherboard of a computer is its primary circuit board. Its responsibility is to link all hardware pieces together. A CPU does all work and is sometimes referred to as the brain and heart of all digital systems. It runs instructions and carries out every single task a computer carries out.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/cpu_dfzmnw.png',
				'hardware_video' => 'https://www.youtube.com/embed/tbRC3dUo9h4',
				'hardware_ref_text' => 'https://www.freecodecamp.org/news/what-is-cpu-meaning-definition-and-what-cpu-stands-for/#:~:text=CPU%20is%20short%20for%20Central,if%20not%20the%20most%20important.',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/cpu_dfzmnw.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016122/images/internal_hardwares/cpu_2_tkzws8.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016139/images/internal_hardwares/cpu_3_s3zulf.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=tbRC3dUo9h4',
				'hardware_name&specs' => '
				<table id="customers">
					<tr><th>Model Name</th><th>Intel® Core™ i9-9900 Processor</th></tr>
					<tr><td>Brand</td><td>Intel</td></tr>
					</td>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="-0.02596969205916012m 0.014092455263086154m -0.004296647425063747m" data-normal="0.006414073238348887m 0.0005883292642919782m -0.9999792565514397m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">LGA</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/cpu/cpu_lga.mp3',
				'hardware_audio_2' => '',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'The pins on the socket, rather than the integrated circuit, are what makes the land grid array a unique type of surface-mount packaging for integrated circuits. A socket or direct soldering to the PCB are two ways that an LGA can be electrically connected to the board.',
				'hardware_caption_2' => '',
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'fan') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/fan.glb?sound=audio/internal_hardwares/computer_fan.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/fan.usdz?sound=audio/internal_hardwares/computer_fan.ogg', 
				'hardware_name' => 'Computer Fan', 
				'hardware_description' => 'A computer fan is a fan used for active cooling that is located inside or connected to a computer casing. To cool a specific component, fans are utilized to circulate air across a heat sink, pull cooler air from the outside into the case, and exhaust warm air from within. Computers employ axial and occasionally centrifugal (blower/squirrel-cage) fans.',
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/fan_vmadpy.png',
				'hardware_video' => 'https://www.youtube.com/embed/xdEqEGrbMkQ',
				'hardware_ref_text' => 'https://en.wikipedia.org/wiki/Computer_fan',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/fan_vmadpy.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016121/images/internal_hardwares/fan_2_w3zcir.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016139/images/internal_hardwares/fan_3_pymdan.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=xdEqEGrbMkQ',
				'hardware_name&specs' => '
				<table id="customers">
					<tr>
						<th>Model Name</th>
						<th>UNI FAN SL-INFINITY</th>
					</tr>
					<tr>
						<td>Brand</td>
						<td>Lian Li</td>
					</tr>
				</table>
				',
				'hardware_hotspots' => '',
				'hardware_audio_1' => '',
				'hardware_audio_2' => '',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => '',
				'hardware_caption_2' => '',
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'gpu') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/gpu.glb?sound=audio/internal_hardwares/gpu.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/gpu.usdz?sound=audio/internal_hardwares/gpu.ogg', 
				'hardware_name' => 'Graphics Card Unit', 
				'hardware_description' => "A chip or electrical circuit known as a graphics processing unit (GPU) is able to produce graphics for display on an electronic device. The GPU was first made available to the general public in 1999, and it is most recognized for being used to produce the fluid visuals that customers anticipate in contemporary movies and video games.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/gpu_ntynsn.png',
				'hardware_video' => 'https://www.youtube.com/embed/LfdK-v0SbGI',
				'hardware_ref_text' => 'https://www.investopedia.com/terms/g/graphics-processing-unit-gpu.asp',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/gpu_ntynsn.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016122/images/internal_hardwares/gpu_2_q7onzb.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016139/images/internal_hardwares/gpu_3_er2gpx.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=LfdK-v0SbGI',
				'hardware_name&specs' => '

				<table id="customers">
					<tr><th>Model Name</th><th>GeForce RTX 3090</th></tr>
					<tr><td>Brand</td><td>Nvidia</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-3" data-position="-0.08522086201460354m 0.05342502147747984m -0.01862667941800332m" data-normal="0.00034540466506350606m -0.0006269435740636121m -0.9999997438186535m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Fan</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-4" data-position="0.05056570387027794m 0.12525284577775425m -0.015359390959523265m" data-normal="0m 0m 1m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Bus interface PCI-E 4.0 x 16</div>
					</button>
					<button id="hot3" class="Hotspot" slot="hotspot-6" data-position="0.1403546808941396m 0.08186498399486472m -0.016423668162705258m" data-normal="1m 0m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">4x HDMI 2.1</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/gpu/gpu_fan.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/gpu/gpu_pcie.mp3',
				'hardware_audio_3' => '../../audio/hotspots_audio/gpu/gpu_hdmi.mp3',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => "The large copper heat sink that this fan uses to dissipate heat. The GPU's heat sink is heated by the air that the fans are blowing into it. The GPU and the computer case are then used to vent this hot air.",
				'hardware_caption_2' => 'A Gen 4 expansion card or slot with a 16-lane configuration is referred to as PCIe 4.0 x16.',
				'hardware_caption_3' => 'The most recent revision of the HDMI® specification, HDMI 2.1, supports a variety of higher video resolutions and refresh rates, including 8K60 and 4K120, as well as resolutions up to 10K.',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'hard_drive') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/hard_drive.glb?sound=audio/internal_hardwares/hdd.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/hard_drive.usdz?sound=audio/internal_hardwares/hdd.ogg', 
				'hardware_name' => 'Hard Disk Drive (HDD)', 
				'hardware_description' => "Your computer's operating system, software, and data files, including documents, images, and music, are all stored on a hard drive, often known as a hard disk or HDD. The remaining parts of your computer cooperate to display the programs and files on your hard disk.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/hdd_vs0jpx.png',
				'hardware_video' => 'https://www.youtube.com/embed/io2CrCm9f0I',
				'hardware_ref_text' => 'https://www.crucial.com/articles/pc-builders/what-is-a-hard-drive',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/hdd_vs0jpx.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016122/images/internal_hardwares/hdd_2_qkef82.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016139/images/internal_hardwares/hdd_3_g0yal1.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=io2CrCm9f0I',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td> <td>Western Digital Caviar SE 80GB SATA WD800JD 7.2K Hard Drive </td>
				<tr><td>Brand</td> <td>Western Digital </td>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="0.017534110900648475m 0.007289039468979602m 0.05710860571414941m" data-normal="0m -1m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">PATA Power</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-2" data-position="-0.007218896460782571m 0.005722434710859552m 0.05677201962937814m" data-normal="0m -1m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">SATA Data</div>
					</button>
					<button id="hot3" class="Hotspot" slot="hotspot-3" data-position="-0.0210729484883366m 0.006329273553444684m 0.057433468027161504m" data-normal="0m 0m 1m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">SATA Power</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/hdd/hdd_pata.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/hdd/hdd_sata_data.mp3',
				'hardware_audio_3' => '../../audio/hotspots_audio/hdd/hdd_sata_power.mp3',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'Parallel Advanced Technology Attachment is known as PATA. It is an IDE standard for attaching storage components to the motherboard, such as optical and hard drives.',
				'hardware_caption_2' => 'Seven pins are typically present on SATA data connectors. SATA data cables are frequently thin and compact, giving the system more room to cool. Additionally, differential signaling is included in these data connectors to lessen the possibility of data loss during transfer.',
				'hardware_caption_3' => "The larger of the two, the SATA power cable connectors have 15 pins. The connector's three pins function in parallel to supply various voltages.",
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'motherboard') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/motherboard.glb?sound=audio/internal_hardwares/motherboard.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/motherboard.usdz?sound=audio/internal_hardwares/motherbard.ogg', 
				'hardware_name' => 'Motherboard', 
				'hardware_description' => "One of the most crucial components of a computer is the motherboard. It holds together a lot of the essential parts of a computer, such as the memory, connections for input and output devices, and the central processor unit (CPU). A highly stiff layer of non-conductive material, usually hard plastic, serves as the motherboard's basis. Traces—thin layers of copper or aluminum foil—are imprinted on this sheet. These traces, which connect the various components, are quite thin. A motherboard also has a number of connectors and slots for connecting additional components.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/motherboard_puqw8a.png',
				'hardware_video' => 'https://www.youtube.com/embed/B-gHA6sI5n8',
				'hardware_ref_text' => 'https://study.com/academy/lesson/what-is-a-motherboard-definition-function-diagram.html#:~:text=A%20motherboard%20is%20one%20of,for%20input%20and%20output%20devices.',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/motherboard_puqw8a.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016122/images/internal_hardwares/motherboard_2_yhaqtm.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016138/images/internal_hardwares/motherboard_3_mxtiwx.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=B-gHA6sI5n8',
				'hardware_name&specs' => '
				<table id="customers">
					<tr><td>Model Name</td> <td>ROG STRIX Z370-E</td></tr>
					<tr><td>Brand</td> <td>Asus ROG</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="0.0006411189694131986m 0.11656502064153823m -0.0032231951605625957m" data-normal="0m -1.5099580252808492e-7m 0.9999999999999887m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Processor Socket</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-2" data-position="0.037890883466132674m 0.13674268421233157m -0.006449966940884448m" data-normal="0m -1.3435886108395827e-7m 0.9999999999999911m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Memory Slot</div>
					</button>
					<button id="hot3" class="Hotspot" slot="hotspot-4" data-position="-0.026013878945453324m 0.06316111202494706m -0.0024115123478824414m" data-normal="-1.1920928766290509e-7m 0.999999999999984m 1.3435887529481304e-7m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">PCI Slot</div>
					</button>
					<button id="hot4" class="Hotspot" slot="hotspot-5" data-position="-0.036001067280769836m 0.15737223643833112m -0.003166306204603451m" data-normal="0m -1.3435886108395824e-7m 0.999999999999991m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">8-Pin CPU Power Connector</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/motherboard/motherboard_processor_socket.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/motherboard/motherboard_ram_slot.mp3',
				'hardware_audio_3' => '../../audio/hotspots_audio/motherboard/motherboard_pci_slot.mp3',
				'hardware_audio_4' => '../../audio/hotspots_audio/motherboard/motherboard_cpu_power.mp3',
				'hardware_audio_5' => '',
				'hardware_caption_1' => "To ensure proper circuit chip insertion, the motherboard's processor socket is a unique mount used only for the CPU.",
				'hardware_caption_2' => 'RAM (computer memory) can be inserted into a computer through a memory slot, memory socket, or RAM slot.',
				'hardware_caption_3' => 'The most typical method of connecting add-on controller cards and other devices to a computer motherboard is via PCI, or peripheral component interconnect.',
				'hardware_caption_4' => 'Modern graphics cards have 8-pin power connectors. Up to 150 watts can be delivered by 8-pin connectors with a 4.2mm pitch, which is twice as much as a 6-pin connector can.',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'nic') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/nic.glb?sound=audio/internal_hardwares/nic.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/nic.usdz?sound=audio/internal_hardwares/nic.ogg', 
				'hardware_name' => 'Network Interface Card', 
				'hardware_description' => "A network interface card (NIC) is a piece of hardware, often a chip or circuit board, that is inserted on a computer to enable network connectivity.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/nic_kdqsx9.png',
				'hardware_video' => 'https://www.youtube.com/embed/oo-tn17rUBo',
				'hardware_ref_text' => 'https://www.techtarget.com/searchnetworking/definition/network-interface-card',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/nic_kdqsx9.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016122/images/internal_hardwares/nic_2_rcs81b.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016138/images/internal_hardwares/nic_3_uhoiwo.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=oo-tn17rUBo',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> TP-Link TG-3468</td></tr>
				<tr><td>Brand</td><td> TP-Link </td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="-0.031937275314703584m 0.0073880858783797795m 0.008538293351470659m" data-normal="-1m 0m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">RJ-45 Lan Port</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-2" data-position="0.02656075041803782m 0.000686173013816147m 0.02441543742975305m" data-normal="-1m 0m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">PCI 32-bit</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/nic/nic_rj45.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/nic/nic_pci.mp3',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'A data port known as a Registered Jack 45 (RJ-45) port is frequently found on hubs, switches, routers, and PCs. With an 8 position 8 conductor (8P8C) jack, it is frequently used for an Ethernet or serial connection.',
				'hardware_caption_2' => 'The memory and I/O port address spaces of the x86 processor family are represented by two distinct 32-bit or 64-bit address spaces provided by PCI.',
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'power_supply') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/internal_hardwares/power_supply.glb?sound=audio/internal_hardwares/psu.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/power_supply.usdz?sound=audio/internal_hardwares/psu.ogg', 
				'hardware_name' => 'Power Supply Unit', 
				'hardware_description' => "An internal piece of IT hardware is known as a power supply unit (PSU). Despite their name, power conversion devices, or PSUs, do not really deliver power to systems. A power supply specifically transforms alternating high voltage current (AC) to direct current (DC) and regulates the DC output voltage to the precise tolerances needed for contemporary computer components.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886096/images/internal_hardwares/psu_bklwlz.png',
				'hardware_video' => 'https://www.youtube.com/embed/ZW1wcoERoDU',
				'hardware_ref_text' => 'https://www.techbuyer.com/uk/blog/What-is-a-Power-Supply-Unit-PSU',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886096/images/internal_hardwares/psu_bklwlz.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016122/images/internal_hardwares/psu_2_im4ekg.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016138/images/internal_hardwares/psu_3_blrs3e.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=ZW1wcoERoDU',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> T.F.SKYWINDINTL 600W 1U Flex Power Supply ITX Nas PSU GPU Power MINI ATX Computer Pwer Supplier</td></tr>
				<tr><td>Brand</td><td> T.F.SKYWINDINTL</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="-0.03739412396344152m 0.006556989255820191m 0.07352908698338133m" data-normal="0m -1.3435886108395832e-7m 0.9999999999999911m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">ATX 24-Pin</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-3" data-position="-0.0625611824151269m 0.005771933864747881m 0.08780981776669962m" data-normal="0.007102154035205436m 0.999726972150701m -0.02226074038417823m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">EPS12V 4-Pin</div>
					</button>
					<button id="hot3" class="Hotspot" slot="hotspot-4" data-position="-0.11317269455171036m 0.0031362286173715337m 0.0719260860260023m" data-normal="0m 0.9999999999999911m 1.3435886108395832e-7m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Molex</div>
					</button>
					<button id="hot4" class="Hotspot" slot="hotspot-5" data-position="-0.11320002837308638m 0.0020091428714859513m 0.013170879668934585m" data-normal="0.16247322193949126m 0.985115195321983m 0.056129351486831604m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">SATA</div>
					</button>
					<button id="hot5" class="Hotspot" slot="hotspot-7" data-position="0.10207539977437115m 0.01815348306877963m 0.0027188818995238714m" data-normal="0.3496801881688458m -1.2587666923811515e-7m 0.9368691296025209m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Power Plug Receptacle</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/psu/psu_atx.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/psu/psu_eps.mp3',
				'hardware_audio_3' => '../../audio/hotspots_audio/psu/psu_molex.mp3',
				'hardware_audio_4' => '../../audio/hotspots_audio/psu/psu_sata.mp3',
				'hardware_audio_5' => '../../audio/hotspots_audio/psu/psu_power_plug.mp3',
				'hardware_caption_1' => 'The typical motherboard connector is an ATX 24 power connecter. These connectors, which have multiple power wires, were primarily used to supply additional power to PCIe cards.',
				'hardware_caption_2' => 'A power supply device called EPS12V is made for PCs with high power requirements and entry-level servers. The EPS12V specification was created by the SSI or Server System Infrastructure forum, an organization that includes numerous computer firms, including HP and Dell, and it was derived from the ATX form factor.',
				'hardware_caption_3' => 'The colloquial name for a two-piece pin and socket interconnection is Molex.',
				'hardware_caption_4' => 'SATA is a type of computer bus interface that links mass storage gadgets like solid-state drives, optical drives, and hard drives to host bus adapters.',
				'hardware_caption_5' => 'The electrical outlet is essentially referred to as a power receptacle. They are apparatuses that enable the primary alternating current power supply in a building to be connected to electrically operated equipment.',
			]]);
		}

		if($hardwarename == 'ram') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/ram.glb?sound=audio/internal_hardwares/ram.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/ram.usdz?sound=audio/internal_hardwares/ram.ogg', 
				'hardware_name' => 'Random Access Memory (RAM)', 
				'hardware_description' => "Random-access memory (RAM), often known as main memory, primary memory, or system memory, is a piece of hardware that enables the storing and retrieval of data on a computer. DRAM is a kind of memory module, and RAM is frequently related to it. Access times are greatly accelerated since data is randomly accessible rather than sequentially as it is on a CD or hard disk. RAM is a volatile memory, in contrast to ROM, and needs electricity to maintain the data accessible. All information in RAM is lost if the computer is switched off.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886096/images/internal_hardwares/ram_hxrsre.png',
				'hardware_video' => 'https://www.youtube.com/embed/-aQOv3T7P8E',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/r/ram.htm#:~:text=Alternatively%20referred%20to%20as%20main,a%20type%20of%20memory%20module.',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1669886096/images/internal_hardwares/ram_hxrsre.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016122/images/internal_hardwares/ram_2_xmncoj.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016138/images/internal_hardwares/ram_3_rakvyo.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=-aQOv3T7P8E',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> Kingston ValueRAM 3GB DDR3 SDRAM Memory Module</td></tr>
				<tr><td>Brand</td><td> Kingston</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="-0.0002104070374049586m 0.13327752301547807m 0.0028906215589845465m" data-normal="0.9999999999999911m -1.3435883843274954e-7m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Memory Chip</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-3" data-position="-0.001005797812135885m 0.10634984203884566m 0.019102234362564374m" data-normal="-0.999999999999991m 1.3435883843274954e-7m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Notch for Alignment</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/ram/ram_chip.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/ram/ram_notch.mp3',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'Microchips called RAM chips are utilized as RAM storage in computers and other electronic devices. This is the real chip that is soldered onto tiny circuit boards to produce RAM cards or sticks, and depending on the model and manufacturer, it has varying performance and capacity ratings. The most popular RAM chip utilized in the mobile device market is DDR3, which has a storage capacity of 1 to 3 GB.',
				'hardware_caption_2' => 'On Random Access Memory (RAM), the Notch on top of the module can be quickly examined to determine whether it is DDR1, DDR2, or DDR3.',
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'sound_card') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/sound_card.glb?sound=audio/internal_hardwares/sound_card.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/sound_card.usdz?sound=audio/internal_hardwares/sound_card.ogg', 
				'hardware_name' => 'Sound Card', 
				'hardware_description' => "Sometimes known as an audio card, sound board, or audio output device. An expansion card or IC known as a sound card is used by computers to generate sound that may be heard through speakers or headphones. Even though a sound card isn't necessary, every computer has one either integrated into the motherboard or in an expansion slot (as seen below) (onboard).",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886096/images/internal_hardwares/soundcard_joq98s.png',
				'hardware_video' => 'https://www.youtube.com/embed/SFBvvlebSmw',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/s/souncard.htm#:~:text=Alternatively%20referred%20to%20as%20an,heard%20through%20speakers%20or%20headphones.',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886096/images/internal_hardwares/soundcard_joq98s.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016122/images/internal_hardwares/soundcard_2_ja4rzo.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016138/images/internal_hardwares/sound_card_3_ytgdm3.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=SFBvvlebSmw',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> Creative Labs Sound Blaster X-Fi Titanium PCI Express Sound Card <br/></td></tr>
				<tr><td>Brand</td><td> Creative <br/></td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-15" data-position="-0.0863808390237466m 0.012135846381306159m -0.028454951484613335m" data-normal="-1m 0m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Line out (front)</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-16" data-position="-0.0863808390237466m 0.012117182791644105m -0.0435336220167173m" data-normal="-1m 0m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Line in</div>
					</button>
					<button id="hot3" class="Hotspot" slot="hotspot-17" data-position="-0.08638083902374666m 0.012797304003998342m 0.012982870025474616m" data-normal="-1m 0m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Digital Output</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/sound_card/sound_card_line_out.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/sound_card/sound_card_line_in.mp3',
				'hardware_audio_3' => '../../audio/hotspots_audio/sound_card/sound_card_digital_out.mp3',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'In order to transfer computer-generated audio to the devices so they can be heard, line out enables external speakers, headphones, or other output devices to connect to the computer.',
				'hardware_caption_2' => 'On computer sound cards, there is a jack called line in or line-in that enables users to connect an external audio device. They are utilized to capture, playback, and alter incoming audio.',
				'hardware_caption_3' => 'Digital out should not be connected to speakers directly; instead, it should be connected to other electronics (like an external amplifier).',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'ssd') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/ssd.glb?sound=audio/internal_hardwares/ssd.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@7b9d7f1/public/models/internal_hardwares/ssd.usdz?sound=audio/internal_hardwares/ssd.ogg', 
				'hardware_name' => 'Solid State Drive', 
				'hardware_description' => "SSD is a storage media that accesses and stores data using non-volatile memory. An SSD provides benefits such as quicker access times, noiseless operation, improved durability, and reduced power consumption because it doesn't have moving components as a hard drive does.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886096/images/internal_hardwares/ssd_ogugc4.png',
				'hardware_video' => 'https://www.youtube.com/embed/aa5l8uof_j0',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/s/ssd.htm#:~:text=Short%20for%20solid%2Dstate%20drive,reliability%2C%20and%20lower%20power%20consumption.',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886096/images/internal_hardwares/ssd_ogugc4.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016122/images/internal_hardwares/ssd_2_itutn8.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016138/images/internal_hardwares/ssd_3_ul0e3p.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=aa5l8uof_j0',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> WD 500GB Blue 3D NAND SATA III 2.5" Internal SSD <br/></td></tr>
				<tr><td>Brand</td><td> Western Digital <br/></td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="-0.06472104974470483m 0.0025954653923357905m -0.0094018011782417m" data-normal="-1m 0m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">SATA Power</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-2" data-position="-0.06472104974470483m 0.0026065856516850803m 0.014270340425267349m" data-normal="-1m 0m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">SATA Data</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/ssd/ssd_sata_power.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/ssd/ssd_sata_data.mp3',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => "The larger of the two, the SATA power cable connectors have 15 pins. The connectors three pins function in parallel to supply various voltages.",
				'hardware_caption_2' => 'Seven pins are typically present on SATA data connectors. SATA data cables are frequently thin and compact, giving the system more room to cool. Additionally, differential signaling is included in these data connectors to lessen the possibility of data loss during transfer.',
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}
		// END INTERNAL HARDWARE DEVICES

		return abort(404);
	}


	public function external_hardware_device($hardwarename) {

		// START EXTERNAL HARDWARE DEVICES
		if($hardwarename == 'digital_camera') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/digital_camera.glb?sound=audio/external_hardwares/digital_camera.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/digital_camera.usdz?sound=audio/external_hardwares/digital_camera.ogg', 
				'hardware_name' => 'Digital Camera', 
				'hardware_description' => "A digital camera is a hardware device that captures images and saves them as data to a memory card. A digital camera employs digital optical components to record the strength and color of light and turn it into pixel data, in contrast to an analog camera, which exposes film chemicals to light. In addition to shooting pictures, many digital cameras also have the ability to capture video.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/digital_camera_k2ctbm.png',
				'hardware_video' => 'https://www.youtube.com/embed/OaWsnJh8Xtk',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/d/digicame.htm#:~:text=A%20digital%20camera%20is%20a,converts%20it%20into%20pixel%20data.',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/digital_camera_k2ctbm.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016171/images/external_hardwares/digital_camera_2_jrnorj.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016188/images/external_hardwares/digital_camera_3_qb8dy6.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=OaWsnJh8Xtk',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> Sigma dp1 Quattro</td></tr>	
				<tr><td>Brand</td><td> Sigma </td></tr>	
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-2" data-position="0.2092806558286689m 1.273836313230301m 1.0830823971813428m" data-normal="0m -1.343588610839583e-7m 0.9999999999999911m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Self-timer Lamp</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-3" data-position="-1.4753625814384628m 1.4987069712020882m -0.34382901769825636m" data-normal="-0.653796741809387m 0m -0.7566702190514901m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Mode Dial</div>
					</button>
					<button id="hot3" class="Hotspot" slot="hotspot-4" data-position="-0.7419008664473289m 1.4257407654214629m -0.1756584292464496m" data-normal="0m 1m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Power</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/digital_camera/digital_camera_self_timer.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/digital_camera/digital_camera_mode_dial.mp3',
				'hardware_audio_3' => '../../audio/hotspots_audio/digital_camera/digital_camera_power.mp3',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'The moment the self-timer is set to take a picture, the lamp blinks.',
				'hardware_caption_2' => "On digital cameras, the mode dial, also known as the camera dial, is used to change the camera's mode.",
				'hardware_caption_3' => 'Power switch. This turns on and off the camera.',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'external_hard_drive') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/external_hard_drive.glb?sound=audio/external_hardwares/external_hard_drive.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/external_hard_drive.usdz?sound=audio/external_hardwares/external_hard_drive.ogg', 
				'hardware_name' => 'External Hard Drive', 
				'hardware_description' => "A portable storage device known as an external hard drive can be wirelessly or through a USB or FireWire connection connected to a computer. External hard drives sometimes have large storage capabilities and are used as network drives or to back up systems.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/external_hard_drive_ctsrsu.png',
				'hardware_video' => 'https://www.youtube.com/embed/Fl8ImWZeXxs',
				'hardware_ref_text' => 'https://www.techtarget.com/whatis/definition/external-hard-drive#:~:text=An%20external%20hard%20drive%20is,serve%20as%20a%20network%20drive.',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/external_hard_drive_ctsrsu.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016171/images/external_hardwares/external_hard_drive_2_agkguy.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016187/images/external_hardwares/external_hard_drive_3_ahny98.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=Fl8ImWZeXxs',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> ADATA 2TB HD680 External USB 3.1 Hard Drive</td></tr>
				<tr><td>Brand</td><td> ADATA</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="-0.005338188552451464m 0.4370976884811617m 1.9870797197191905m" data-normal="0m 0m 1m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">SATA to USB bridge adapter</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/external_hard_drive/external_hard_drive_sata_usb.mp3',
				'hardware_audio_2' => '',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'A SATA to USB adapter is the best option if you need to externally connect a hard drive, disk drive, or any other SATA connector to your system.',
				'hardware_caption_2' => '',
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'joystick') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/joystick.glb?sound=audio/external_hardwares/joystick.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@9276751/public/models/external_hardwares/joystick.usdz?sound=audio/external_hardwares/joystick.ogg', 
				'hardware_name' => 'Joystick', 
				'hardware_description' => "A joystick is an input device that may be used to manage the movement of a computer device's cursor or pointer. The joystick has a lever that may be used to control the pointer/cursor movement. The input device is mostly used for gaming applications, though occasionally graphical ones as well. For those with movement disorders, a joystick might be useful as an input device.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/joystrick_b5kybd.png',
				'hardware_video' => 'https://www.youtube.com/embed/R1aApvrAAn4',
				'hardware_ref_text' => 'https://www.techopedia.com/definition/31108/joystick#:~:text=A%20joystick%20is%20an%20input,%2C%20sometimes%2C%20in%20graphics%20applications.',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/joystrick_b5kybd.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016171/images/external_hardwares/joystick_2_c62nnd.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/joystrick_b5kybd.png" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=R1aApvrAAn4',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> Atari 2600 Joystick</td></tr>
				<tr><td>Brand</td><td> Atara</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="0.38510991138321954m 0.5940341228776713m -0.3771414767906275m" data-normal="0m 1m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Programmable Button</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-2" data-position="-0.14507768291530815m 0.6110624376330759m -0.09236791106777115m" data-normal="-0.8703991066643111m 0m -0.49234682401531693m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Hand Rest</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/joystick/joystick_button.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/joystick/joystick_hand_rest.mp3',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'Button on the joystick that can be used as hotkeys and for key-specific operations.',
				'hardware_caption_2' => 'Better steering control is provided by the hand rest, which also lessens harmful static load on the hands.',
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'keyboard') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/keyboard.glb?sound=audio/external_hardwares/keyboard.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/keyboard.usdz?sound=audio/external_hardwares/keyboard.ogg', 
				'hardware_name' => 'Keyboard', 
				'hardware_description' => "One of the main input methods for computers is the keyboard. A keyboard is made up of buttons that may be used to produce letters, numbers, and symbols as well as carry out other tasks, much like an electronic typewriter. More in-depth details and responses to some commonly asked questions concerning the keyboard are provided in the sections that follow.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886822/images/external_hardwares/keyboard_b7etzu.png',
				'hardware_video' => 'https://www.youtube.com/embed/g2SiyJVFcDI',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/k/keyboard.htm',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886822/images/external_hardwares/keyboard_b7etzu.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016171/images/external_hardwares/keyboard_2_tjstyf.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016187/images/external_hardwares/keyboard_3_scf6im.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=g2SiyJVFcDI',
				'hardware_name&specs' => '
				<table id="customers">
					<tr><td>Model Name</td><td> Logitech G213 Keyboard</td></tr>
					<tr><td>Brand</td><td> Logitech</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="-0.9641034726523434m 0.42505853860578857m -0.08403005443259226m" data-normal="0.1403765879171798m 0.9890944071890275m 0.04457204541096251m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Main Typing Keypad</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-2" data-position="-0.4952701546830566m 0.4647510220129679m -1.0011135316225734m" data-normal="0.1403765879171798m 0.9890944071890273m 0.04457204541096251m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Function Keys</div>
					</button>
					<button id="hot3" class="Hotspot" slot="hotspot-4" data-position="1.8870634831200608m 0.4018158757116155m 0.3552108646465608m" data-normal="0.00009384217432264161m 0.9989574181513464m 0.04565159267804801m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Directional Keys</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/keyboard/keyboard_main.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/keyboard/keyboard_function.mp3',
				'hardware_audio_3' => '../../audio/hotspots_audio/keyboard/keyboard_directional.mp3',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'Main typing keypad. It is the main tool used for text entry. In addition to keys for general purposes, a keyboard often include keys for particular letters, numerals, and special characters.',
				'hardware_caption_2' => 'Specific actions can be taken using the function keys.',
				'hardware_caption_3' => 'You can navigate between pages and documents, move the cursor, and edit text by using the directional keys.',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'mic') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/mic.glb?sound=audio/external_hardwares/microphone.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/mic.usdz?sound=audio/external_hardwares/microphone.ogg', 
				'hardware_name' => 'Microphone', 
				'hardware_description' => "A microphone, also shortened to 'mic,' is a hardware input and peripheral device created by Emile Berliner in 1877. Computer users may enter sounds into their computers via a microphone.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886822/images/external_hardwares/microphone_yzpnqd.png',
				'hardware_video' => 'https://www.youtube.com/embed/d_crXXbuEKE',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/m/microphone.htm',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886822/images/external_hardwares/microphone_yzpnqd.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016171/images/external_hardwares/microphone_2_ntrrr1.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016188/images/external_hardwares/microphone_3_pcjieb.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=d_crXXbuEKE',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> Razer Seiren X USB Streaming Microphone</td></tr>
				<tr><td>Brand</td><td> Razer</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="-0.06218806740955997m 3.0753563207871992m 0.6672263089613846m" data-normal="-0.287753900287859m 0.948610763600599m 0.13166363222322758m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Volume Changer</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-4" data-position="0.09998229675899468m 2.482411710393791m 0.6614617913073685m" data-normal="0.09801411234006746m 0m 0.9951850248984803m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Power</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/mic/mic_volume.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/mic/mic_power.mp3',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'This will lower or higher the volume of your mic.',
				'hardware_caption_2' => 'This will turn on or off your mic.',
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'monitor_crt') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => '/models/external_hardwares/monitor_crt.glb?sound=audio/external_hardwares/monitor_crt.ogg', 
				'hardware_url_ios' => '/models/external_hardwares/monitor_crt.usdz?sound=audio/external_hardwares/monitor_crt.ogg', 
				'hardware_name' => 'Monitor (CRT)', 
				'hardware_description' => "An electrical visual computer display known as a monitor consists of a screen, circuitry, and the housing for that equipment. Cathode ray tubes (CRT) were used in older computer monitors, which made them bulky, heavy, and ineffective. Since they are lighter and more energy-efficient, flat-screen LCD displays are now found in gadgets like laptops, PDAs, and desktop PCs. Another name for a monitor is a screen or a visual display device (VDU).",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886822/images/external_hardwares/monitor_crt_pzn7zb.png',
				'hardware_video' => 'https://www.youtube.com/embed/LaqeGAXkIsE',
				'hardware_ref_text' => 'https://www.techopedia.com/definition/3185/monitor#:~:text=Techopedia%20Explains%20Monitor-,What%20Does%20Monitor%20Mean%3F,them%20large%2C%20heavy%20and%20inefficient.',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886822/images/external_hardwares/monitor_crt_pzn7zb.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016172/images/external_hardwares/monitor_crt_2_xhthe5.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016187/images/external_hardwares/monitor_crt_3_ypwnmu.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=LaqeGAXkIsE',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> Viewsonic-PS790</td></tr>
				<tr><td>Brand</td><td> Viewsonic</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="-4.978357889772517m 5.951866172214682m 28.571962703226205m" data-normal="-0.01687504202214337m 0.015588905899498557m -0.9997360746565103m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">VGA</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/monitor_crt/monitor_crt_vga.mp3',
				'hardware_audio_2' => '',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'For computer video output, there is a standard connector called the Video Graphics Array (VGA).',
				'hardware_caption_2' => '',
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'monitor_lcd') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/monitor_lcd.glb?sound=audio/external_hardwares/monitor_lcd.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/monitor_lcd.usdz?sound=audio/external_hardwares/monitor_lcd.ogg', 
				'hardware_name' => 'Monitor (LCD)', 
				'hardware_description' => "An electrical visual computer display known as a monitor consists of a screen, circuitry, and the housing for that equipment. Cathode ray tubes (CRT) were used in older computer monitors, which made them bulky, heavy, and ineffective. Since they are lighter and more energy-efficient, flat-screen LCD displays are now found in gadgets like laptops, PDAs, and desktop PCs. Another name for a monitor is a screen or a visual display device (VDU).",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886822/images/external_hardwares/monitor_lcd_yr3xzl.png',
				'hardware_video' => 'https://www.youtube.com/embed/LaqeGAXkIsE',
				'hardware_ref_text' => 'https://www.techopedia.com/definition/3185/monitor#:~:text=Techopedia%20Explains%20Monitor-,What%20Does%20Monitor%20Mean%3F,them%20large%2C%20heavy%20and%20inefficient.',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886822/images/external_hardwares/monitor_lcd_yr3xzl.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016172/images/external_hardwares/monitor_lcd_2_hc50dr.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016187/images/external_hardwares/monitor_lcd_3_prlfzz.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=LaqeGAXkIsE',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> Acer-k222hql</td></tr>
				<tr><td>Brand</td><td> Acer</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="-0.9825731523463846m 1.1621426820073184m -0.0024319259595321496m" data-normal="0m -0.999999999999991m -1.3435886108395827e-7m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">VGA</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-2" data-position="-0.7486086733172309m 1.1621426837379762m -0.015312785785925187m" data-normal="0m -0.9999999999999911m -1.343588610839583e-7m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">DVI-D</div>
					</button>
					<button id="hot3" class="Hotspot" slot="hotspot-3" data-position="-0.5493025428189034m 1.1621426817668803m -0.0006424043841099913m" data-normal="0m -0.9999999999999911m -1.343588610839583e-7m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">HDMI</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/monitor_lcd/monitor_lcd_vga.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/monitor_lcd/monitor_lcd_dvid.mp3',
				'hardware_audio_3' => '../../audio/hotspots_audio/monitor_lcd/monitor_lcd_hdmi.mp3',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'For computer video output, there is a standard connector called the Video Graphics Array (VGA).',
				'hardware_caption_2' => "Computers with HD graphics cards have DVI-D ports. These cards send high-resolution digital video signals to digital monitors.",
				'hardware_caption_3' => "The HDMI port is one of the most frequently utilized ports (HDMI). Both audio and visual signals are supported by this digital interface. Its one of the most popular connections for using a single cable to transport high-definition video and audio between devices.",
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'mouse') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/mouse.glb?sound=audio/external_hardwares/mouse.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/mouse.usdz?sound=audio/external_hardwares/mouse.ogg', 
				'hardware_name' => 'Mouse', 
				'hardware_description' => "A computer mouse is a portable hardware input tool used for pointing, moving, and selecting text, icons, files, and folders on a computer's graphical user interface (GUI). A mouse may also be used to drag and drop things and provide you access to the right-click menu in addition to these features. The mouse is set up in front of desktop computers on a flat surface, such as a desk or mouse pad.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886822/images/external_hardwares/mouse_jjvpxm.png',
				'hardware_video' => 'https://www.youtube.com/embed/oobt4TmEJ8U',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/m/mouse.htm',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886822/images/external_hardwares/mouse_jjvpxm.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016172/images/external_hardwares/mouse_2_fs1h0i.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016187/images/external_hardwares/mouse_3_tr0hvv.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=oobt4TmEJ8U',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> Logitech G402 Hyperion Fury FPS</td></tr>
				<tr><td>Brand</td><td> Logitech</td></tr></td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-3" data-position="0.023310786950688223m 0.7134425979464922m 1.2217872565331427m" data-normal="-0.039967130024597786m 0.8888727959914299m 0.4564074726206561m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Mouse Body</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-4" data-position="-0.014777512552314007m 0.7591624696654303m -0.4118978377089535m" data-normal="-0.9584834948588766m 0.2826980915443531m 0.03729851364725475m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Scroll Wheel</div>
						</button>
					<button id="hot3" class="Hotspot" slot="hotspot-5" data-position="-0.5147462945886504m 0.32717948336644387m -0.5013179237088558m" data-normal="-0.9880400367703004m 0.1470235338429931m -0.04648619402857061m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Side Button</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/mouse/mouse_mouse_body.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/mouse/mouse_scroll_wheel.mp3',
				'hardware_audio_3' => '../../audio/hotspots_audio/mouse/mouse_side.mp3',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'The portion of the mouse you are holding in your hand is its body. It typically has a smooth surface and is made of plastic or metal to facilitate movement.',
				'hardware_caption_2' => "To navigate up and down any page without utilizing the vertical scroll bar on the right side of a document or website, utilize the scroll wheel that is positioned in the middle of the mouse. Another function of the mouse's scroll wheel is as a third button.",
				'hardware_caption_3' => "A function or macro can be assigned to a mouse's side buttons.",
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'plotter') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/plotter.glb?sound=audio/external_hardwares/plotter.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/plotter.usdz?sound=audio/external_hardwares/plotter.ogg', 
				'hardware_name' => 'Plotter', 
				'hardware_description' => "A plotter is a piece of computer gear, similar to a printer, used to produce vector graphics. Plotters create several, continuous lines on paper as opposed to numerous dots, as is the case with conventional printers, using a pen, pencil, marker, or other writing instrument as opposed to toner. Schematics and other comparable applications are printed using plotters. These tools were originally often used for computer-aided design, but wide-format printers mostly replaced them.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886822/images/external_hardwares/plotter_w2obpj.png',
				'hardware_video' => 'https://www.youtube.com/embed/kZLb9kvqRWI',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/p/plotter.htm',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886822/images/external_hardwares/plotter_w2obpj.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016172/images/external_hardwares/plotter_2_fsnsze.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016187/images/external_hardwares/plotter_3_wyucjd.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=kZLb9kvqRWI',
				'hardware_name&specs' => '
				<table id="customers">
					<tr><td>Model Name</td><td> HP DesignJet T630</td></tr>
					<tr><td>Brand</td><td> HP</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="0.19464974733949292m 7.039204403436852m -0.520853158080953m" data-normal="-0.000009542895216473279m 0.9997793111961161m 0.02100782742581658m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Window</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-2" data-position="1.0650421995537007m 2.588579903553136m 3.8012006069522073m" data-normal="0m -0.5983850089883103m 0.8012087000389223m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Basket</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/plotter/plotter_window.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/plotter/plotter_basket.mp3',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'This is the window. This cover the Printhead.',
				'hardware_caption_2' => 'The basket keeps the planned film from touching the ground. Thus, soiling is avoided.',
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'printer') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/printer.glb?sound=audio/external_hardwares/printer.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/printer.usdz?sound=audio/external_hardwares/printer.ogg', 
				'hardware_name' => 'Printer', 
				'hardware_description' => "An external hardware output device known as a printer converts digital data stored on a computer or other device into a physical copy. You may print numerous copies of a report you produced on your computer, for instance, and distribute them during a staff meeting. One of the most well-liked computer accessories, printers are frequently used to print text and images.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886822/images/external_hardwares/printer_jdgvcc.png',
				'hardware_video' => 'https://www.youtube.com/embed/A_a9eFN-qLc',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/p/printer.htm',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886822/images/external_hardwares/printer_jdgvcc.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016172/images/external_hardwares/printer_2_kjgkfh.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016186/images/external_hardwares/printer_3_sqmlnl.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=A_a9eFN-qLc',
				'hardware_name&specs' => '
				<table id="customers">
					<tr><td>Model Name</td><td> Epson 4750 printer</td></tr>
					<tr><td>Brand</td><td> Epson</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="3.270358359744964m 0.823335342082719m -0.15959090639572016m" data-normal="-0.006497704738077495m 0.9997826537292805m 0.019809723248304534m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Output Tray</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-2" data-position="2.070017763590979m 1.6562956468556407m 0.9730014936574851m" data-normal="0.7690879274299888m 0.6391376940914726m 0.002601513574772636m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Control Panel</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/printer/printer_output.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/printer/printer_control_panel.mp3',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'The printed side of the paper is output to the output tray located on top of the printer. In the order that the sheets were printed, the printed paper is collected in the output tray face down.',
				'hardware_caption_2' => 'The control panel has icons and buttons for operating the printer, as well as a control panel display for choosing print settings.',
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'projector') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/projector.glb?sound=audio/external_hardwares/projector.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/projector.usdz?sound=audio/external_hardwares/projector.ogg', 
				'hardware_name' => 'Projector', 
				'hardware_description' => "A projector is an output device that reproduces images by projecting them onto a screen, wall, or other surface using images created by a computer or Blu-ray player. The surface that is projected upon is often big, flat, and softly colored. To ensure that everyone in the room can view a presentation, you may, for instance, utilize a projector to display it on a wide screen. Moving or motionless pictures can be produced via projectors (slides) (videos). A projector often has the same size and weight as a toaster.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/projector_uhaxqv.png',
				'hardware_video' => 'https://www.youtube.com/embed/FM-M1PjAD88',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/p/projecto.htm#:~:text=A%20projector%20is%20an%20output,%2C%20flat%2C%20and%20lightly%20colored.',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/projector_uhaxqv.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016172/images/external_hardwares/projector_2_oqxeip.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016186/images/external_hardwares/projector_3_qzpsbp.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=FM-M1PjAD88',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> Epson ebx450</td></tr>
				<tr><td>Brand</td><td> Epson</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-3" data-position="0.9973827502523005m 1.1663620547082307m 1.613036834788188m" data-normal="0.00014863222594806765m 0.93807460058061m 0.3464332860075522m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">A/V Mute Slide Lever</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-4" data-position="0.6822411724767101m 1.2484388009179284m -0.6304134041531988m" data-normal="0m 1m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Control Panel</div>
					</button>
					<button id="hot3" class="Hotspot" slot="hotspot-5" data-position="0.9702596838543239m 1.04182272387317m 1.1508510328520494m" data-normal="0.0006319113460094031m -6.559945581529487e-8m 0.9999998003440035m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Zoom Ring</div>
					</button>
					<button id="hot4" class="Hotspot" slot="hotspot-7" data-position="-0.14993439902355793m 0.9940610507978067m -1.5542595809682624m" data-normal="0m 1m 0m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">HDMI</div>
					</button>
					<button id="hot5" class="Hotspot" slot="hotspot-8" data-position="0.2901319998335277m 0.9740675941648499m -1.5965871779257357m" data-normal="0m 0m -1m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">VGA</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/projector/projector_av_mute.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/projector/projector_control_panel.mp3',
				'hardware_audio_3' => '../../audio/hotspots_audio/projector/projector_zoom_ring.mp3',
				'hardware_audio_4' => '../../audio/hotspots_audio/projector/projector_hdmi.mp3',
				'hardware_audio_5' => '../../audio/hotspots_audio/projector/projector_vga.mp3',
				'hardware_caption_1' => 'The projector screen turns black when the AV mute is used. If you need to stop projecting for a moment, this feature might come in handy. However, because the projector bulb is still powered on while in use, its use should be restricted to less than a minute.',
				'hardware_caption_2' => 'You can select what your projector will show on the screen using the Control Panel.',
				'hardware_caption_3' => 'Using the zoom ring on the projector, you can resize the image.',
				'hardware_caption_4' => "The projector's HDMI input receives the highest traffic. Digital image and sound data are sent to the projector via an HDMI connection from a laptop, Blu-ray.",
				'hardware_caption_5' => 'The VGA connector connects a computer to a monitor, projector, or TV for use with display devices.',
			]]);
		}

		if($hardwarename == 'sd_card') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/sd_card.glb?sound=audio/external_hardwares/sd_card.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/sd_card.usdz?sound=audio/external_hardwares/sd_card.ogg', 
				'hardware_name' => 'SD Card', 
				'hardware_description' => "One of the most popular memory card kinds used with electronics is the SD card, often known as a Secure Digital card. Over 8000 distinct kinds of electronic devices from over 400 different companies, including digital cameras and cell phones, employ the SD technology. Due of its widespread use, it is regarded as the industry standard.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/sd_card_dni13b.png',
				'hardware_video' => 'https://www.youtube.com/embed/zQYIcxYXafc',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/s/sdcard.htm',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/sd_card_dni13b.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016172/images/external_hardwares/sd_card_2_usling.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016186/images/external_hardwares/sd_card_3_fqssvj.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=zQYIcxYXafc',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> Samsung PRO Endurance Card</td></tr>
				<tr><td>Brand</td><td> Samsung</td></tr>
				</table>
				',
				'hardware_hotspots' => '
				<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="-0.28853310442372376m 0.525870805881832m -0.022257017714673394m" data-normal="0m 0.258819609533249m 0.9659256750501338m" data-visibility-attribute="visible">
					<div class="HotspotAnnotation">Storage Capacity</div>
					</button>
				<button id="hot2" class="Hotspot" slot="hotspot-2" data-position="0.4346767130343661m 0.30739469395433655m 0.03628361687243711m" data-normal="0m 0.258819609533249m 0.9659256750501338m" data-visibility-attribute="visible">
					<div class="HotspotAnnotation">UHS Class</div>
				</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/sd_card/sd_card_storage.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/sd_card/sd_card_uhs.mp3',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => "Probably the most frequent marking on an SD card is this one. This displays how much space a specific card can hold. However, keep in mind that, as with all storage devices, you should anticipate that the amount of actual (usable) storage space you receive will be less than the card's stated capacity.",
				'hardware_caption_2' => 'The Ultra High Speed Class, also known as the UHS Class, completes our list of SD card markings. The SD Association introduced the UHS class in 2009; it provides faster transfer rates for SDHC and SDXC and is designed for high definition video recording.',
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'speaker') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/speaker.glb?sound=audio/external_hardwares/speaker.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/speaker.usdz?sound=audio/external_hardwares/speaker.ogg', 
				'hardware_name' => 'Speaker', 
				'hardware_description' => "A computer speaker is a piece of hardware used for audio output that is connected to a computer. The sound card in the computer generates the signal that is needed to generate the sound that emanates from a computer speaker. The Harman Kardon Soundsticks III 2.1 Channel Multimedia Speaker System is seen in the image.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/spekare_wnhk7m.png',
				'hardware_video' => 'https://www.youtube.com/embed/BHPg2UnbIe4',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/s/speaker.htm#:~:text=A%20computer%20speaker%20is%20an,2.1%20Channel%20Multimedia%20Speaker%20System.',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/spekare_wnhk7m.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016172/images/external_hardwares/speaker_2_lvn4dc.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016186/images/external_hardwares/speaker_3_p9oc7o.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=BHPg2UnbIe4',
				'hardware_name&specs' => '
				<table id="customers">
					<tr><td>Model Name</td><td> LogiTech Z333</td></tr>
					<tr><td>Brand</td><td> Logitech</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-2" data-position="-0.05158121390469131m 0.46496433358779987m 0.09540411923065667m" data-normal="0.47509349909824644m -0.1993447224880479m 0.8570576694311463m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Cone</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-12" data-position="-0.12878495664938194m 0.2734188218528101m 0.2218127491139933m" data-normal="-0.2854754750302498m -0.4547075753967475m -0.8436496749439689m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Surround</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/speaker/speaker_cone.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/speaker/speaker_surround.mp3',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'The primary active area of the loudspeaker is the loudspeaker cone or speaker diaphragm. It forces the air backwards and forwards to produce sound waves when the coil.',
				'hardware_caption_2' => "In surround sound systems, the back speaker that is positioned behind the listener is also referred to as a surround speaker. This is due to the fact that they are in charge of a film's or game's ambiance and sound effects.",
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'trackball') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/trackball.glb?sound=audio/external_hardwares/trackball.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/trackball.usdz?sound=audio/external_hardwares/trackball.ogg', 
				'hardware_name' => 'Trackball', 
				'hardware_description' => "The trackball is an input device that resembles a mouse turned sideways or upside down. A trackball is located on the top or side of the mouse, as opposed to a mechanical mouse ball that travels along the work surface. With the mouse not actually being moved, the user may control the on-screen pointer by rotating the ball in two dimensions with their fingers or thumb. A trackball helps avoid RSI since it involves less arm and wrist motion than a normal mouse and is frequently less unpleasant for the user to use.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/trackball_wbhkwk.png',
				'hardware_video' => 'https://www.youtube.com/embed/Lzk1Hfd0Dmk',
				'hardware_ref_text' => 'https://www.computerhope.com/jargon/t/trackbal.htm',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/trackball_wbhkwk.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016173/images/external_hardwares/trackball_2_ycekdr.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016186/images/external_hardwares/trackball_3_wwswyg.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=Lzk1Hfd0Dmk',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> Es6c Trackball</td></tr>
				<tr><td>Brand</td><td> Es6c</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="-0.31460056964934885m 0.386970239354648m -0.0624786007477731m" data-normal="0.6192329405463433m -0.7355305811906581m -0.2748551063299751m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Track Ball</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-2" data-position="-0.3328130092627672m 0.20187937605527387m 0.048722915366300926m" data-normal="0.7759485288343615m -0.6247602194937536m -0.08705486050707892m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">Function Assignment Buttons</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/trackball/trackball_trackball.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/trackball/trackball_function.mp3',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => "This is a ball. That's why they call this trackball.",
				'hardware_caption_2' => 'The buttons for function assignment. The forward button is on top, and the backward button is at the bottom.',
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		if($hardwarename == 'usb_card_reader') {
			return view('hardware', ['hardware_info' => [
				'hardware_url_android' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/usb_card_reader.glb?sound=audio/external_hardwares/memory_card_reader.ogg', 
				'hardware_url_ios' => 'https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/models/external_hardwares/usb_card_reader.usdz?sound=audio/external_hardwares/memory_card_reader.ogg', 
				'hardware_name' => 'USB Card Reader', 
				'hardware_description' => "A memory card reader is a compact device that is used to access, read, copy, and backup data from a variety of memory cards, including SD (Secure Digital), CF (CompactFlash), MMC (MultiMediaCardC), and others. It is sometimes referred to as a USB card reader and an SD card reader.",
				'hardware_image' => 'https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/card_reader_wv14dj.png',
				'hardware_video' => 'https://www.youtube.com/embed/f8T_E4RCvUc',
				'hardware_ref_text' => 'https://www.sysdevlabs.com/articles/additional-equipment/memory-card-reader/',
				'hardware_ref_image' => '
					<div class="carousel-item active">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/card_reader_wv14dj.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1670016171/images/external_hardwares/card_reader_2_zsnrom.png" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="https://res.cloudinary.com/dr9p65xlj/image/upload/w_400,h_400,c_fill/v1670016253/images/external_hardwares/card_reader_3_icipbr.jpg" class="d-block w-100" alt="...">
					</div>
				',
				'hardware_ref_video' => 'https://www.youtube.com/watch?v=f8T_E4RCvUc',
				'hardware_name&specs' => '
				<table id="customers">
				<tr><td>Model Name</td><td> UGREEN Card Reader USB 3.0</td></tr>
				<tr><td>Brand</td><td> UGREEN</td></tr>
				</table>
				',
				'hardware_hotspots' => '
					<button id="hot1" class="Hotspot" slot="hotspot-1" data-position="-0.0068829909873281275m 0.06817509889598124m 0.6034114759049569m" data-normal="-9.711503793160696e-8m 0.9999999999999953m 7.500737628111567e-9m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">USB 3.0</div>
					</button>
					<button id="hot2" class="Hotspot" slot="hotspot-3" data-position="0.35635900100376183m 0.2957694360571439m 0.010652581684511608m" data-normal="0m 0.9998000724174381m -0.019995379318375764m" data-visibility-attribute="visible">
						<div class="HotspotAnnotation">USB C</div>
					</button>
				',
				'hardware_audio_1' => '../../audio/hotspots_audio/usb_card_reader/usb_card_reader_usb3.mp3',
				'hardware_audio_2' => '../../audio/hotspots_audio/usb_card_reader/usb_card_reader_usbc.mp3',
				'hardware_audio_3' => '',
				'hardware_audio_4' => '',
				'hardware_audio_5' => '',
				'hardware_caption_1' => 'In November 2008, the USB 3.0 specification was introduced. The majority of modern computers and gadgets support USB 3.0, often known as SuperSpeed USB.',
				'hardware_caption_2' => "A rotationally symmetrical connector makes up the 24-pin USB-C connector system. The connector's precise capabilities, which are identified by its transfer requirements, are not to be confused with the name C, which merely refers to the connector's physical arrangement or form factor.",
				'hardware_caption_3' => '',
				'hardware_caption_4' => '',
				'hardware_caption_5' => '',
			]]);
		}

		// END INTERNAL HARDWARE DEVICES

		return abort(404);
	}
}
