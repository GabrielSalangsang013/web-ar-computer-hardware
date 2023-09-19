# Markerless Web based Augmented Reality Technology for Information Technology Course Visualizing Computer Hardware

![Alt text](cover.png)

## Problem
The BSIT students in University of the Assumption S.Y (2022-2023) study computer hardware in text and 2d images based learning. We want to add a new feature in learning computer hardware which is integrating a web-based augmented reality. Bringing virtual 3d hardware devices into our world. This can improve our quality education and for the learning of all BSIT students.

## Team
- Salangsang, Gabriel
- Salonga, Clark Jhan Ranier

## Project Description

Web-based Augmented Reality (WebAR) is a technology that allows users to view and interact with augmented reality (AR) content in a web browser. 

Reference: https://wear-studio.com/all-about-webar/

![ezgif com-gif-maker (1) (1)](https://user-images.githubusercontent.com/74645297/207735115-b0546cbb-09e5-489c-b461-772cbd1fdbcc.gif)

![ezgif com-gif-maker (1)](https://user-images.githubusercontent.com/74645297/207735832-63434012-2705-406c-8695-1081f098858d.gif)

## How to use?

#### 1. Clone the repo.
```sh
$ git clone https://github.com/GabrielSalangsang013/web-ar-computer-hardware.git
```

#### 2. Open XAMPP and run apache, and mysql database.

#### 3. Create database name "team_cord_web_ar".

#### 4. Open the project in VS code.

#### 5. Open new VS code terminal.

#### 6. Install the packages.
```sh
$ composer install
```

#### 7. Generate key.
```sh
$ php artisan key:generate
```

#### 8. Run migrate.
```sh
$ php artisan migrate
```

#### 9. Go to [https://firebase.google.com/](firebase) and create a firebase project.

#### 10. In your firebase project, go to the project settings.

#### 11. You can get firebase credentials in the project settings. Scroll down and click the npm input radio button and copy the firebaseConfig variable value.

#### 12. Now go back to the project folder in VS code, go to public/js/firebase-conf.js and paste the firebase config object.

#### 13. Run the project
```sh
$ php artisan serve
```

## Version
History Version of our Project
- Version 1.0 (10/29/2022)
	- Update: This is first complete version of our project. Only UA students can login to this web application.
	- Remaining: Two thing need to add and modify
		- First is add complete animated system unit;
		- Second add UI alert box in login
- Version 1.3.5 (10/30/2022)
	- Update: Added animated system unit in dashboard page, with these I also modify all pages along with their own css.
		- Update title tag each pages.
	- Remaining:
		- Add UI alert box in login
- Version 1.3.6 (10/31/2022)
	- Update: Fix bug, make model-viewer drag always in mobile phones both dashboard and hardware page
	- Remaining:
		- Add UI alert box in login
- Version 1.3.7 (10/31/2022)
	- Update: Fix bug, make model-viewer don't override the nav links in mobile responsive
	- Remaining:
		- Add UI alert box in login
- Version 1.3.8 (10/31/2022)
	- Update: Add pan view in dashboard system unit animation
	- Remaining:
		- Add UI alert box in login
- Version 1.5.20 (11/05/2022)
	- Update:
		- Citation Text, Image & Videos in Hardware page.
		- Paraphare the description of each devices in Hardware page.
		- Changing title "View this setup" to "PC assembly simulator" section in Dashboard page.
		- Add ionic CDN then used the Ionic UI component search box, then create functional on page filter search in Internal and External hardware devices page.
		- Add box shadow and border-radius in PC assembly simulator in Dashboard page.
		- Add ionic CDN then used the Ionic UI component alert box in the Login page for login purposes then add functionality.
		- Remove background color of model viewer in Hardware page.
		- Remove background color of model viewer when mobile view in Dashboard page.
		- Remove url global variable URL, to fix bug not running when CDN ionic added to Login page.
		- Update container class width property min function value by changing 2rem to 0px in all pages.
		- Add more margin at bottom of description in Hardware page using br tag and few margin at top of description in Hardware page using also br tag.
		- Put font-family property value apercu from universal selector to container class in internalexternalhardware.css.
		- Remove font-family property value apercu from universal selector in index.css and used ionic font. So that the Login page use Ionic font.
		- Make still scrollable when Ionic CDN has been added to the Internal hardware device page and External hardware device page. This has been fixed by overriding body tag using CSS properties in the internalexternalhardware.css.
	- Remaining:
		- No bugs to fix or important to add yet.
- Version 1.5.21 (11/05/2022)
	- Update: Fix bug all references url in Hardware page. Make ellipsis when reach 100% width both desktop and mobile view. Previous version only mobile view where all urls in mobile view have ellipsis.
	- Remaining:
		- No bugs to fix or important to add yet.
- Version 1.5.22 (11/05/2022)
	- Update: Make still scrollable when Ionic CDN has been added to the Login page. This has been fixed by overriding body tag using CSS properties in the index.css.
	- Remaining:
		- No bugs to fix or important to add yet.
- Version 1.5.23 (11/05/2022)
	- Update: Override height, max-height and transform property css in ionic css using index.css. To make login page follow the design.
	- Remaining:
		- No bugs to fix or important to add yet.
- Version 1.5.24 (11/05/2022)
	- Update: Use semantic element (button tag) instead non-semantic element (div tag) in google login button in Login page. It also update the index.css.
	- Remaining:
		- No bugs to fix or important to add yet. 
- Version 1.6.24 (11/07/2022)
	- Update: Improve the performance of the website. (Use CDN, Minify CSS, JS and Laravel pages).
	- Remaining:
		- No bugs to fix or important to add yet. 
- Version 1.6.25 (11/08/2022)
	- Update: Fix bug, wrong .usdz file imported at pc system simulation.
	- Remaining:
		- No bugs to fix or important to add yet. 
- Version 1.7.25 (11/11/2022)
	- Update: Remove model-viewer legacy cdn. android device can enable A.R experience as long the device has installed ARCore.
	- Remaining:
		- No bugs to fix or important to add yet.
- Version 1.7.26 (11/14/2022)
	- Update: Added poster attribute to model-viewer, loading .gif file.
	- Remaining:
		- No bugs to fix or important to add yet.
- Version 1.7.27 (11/21/2022)
	- Update: Added android requirement text in login page.
	- Remaining:
		- No bugs to fix or important to add yet.
- Version 1.7.28 (11/24/2022)
	- Update: Added labels in each part of the CPU.
	- Remaining:
		- No bugs to fix or important to add yet.
- Version 1.7.29 (11/25/2022)
	- Update: Added box shadow in few devices in dashboard page.
	- Remaining:
		- No bugs to fix or important to add yet.
- Version 1.9.35 (12/02/2022)
	- Update: Added table contain model name and brand, make own picture each hardware device, add audio while in ar view mode.
	- Remaining:
		- No bugs to fix or important to add yet.