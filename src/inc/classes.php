<?php
	//include 'inc/config.php';
	class App {
		
		//private $host = '134.36.216.17';
		//private $dbname = 'dixd2alayt';
		//private $dbuser = 'dixd2alayt';
		//private $dbpass = '';
		
		private $host = '127.0.0.1';
		private $dbname = 'nostone';
		private $dbuser = 'nostone';
		private $dbpass = 'nostone';
		
		/*private $host = '127.0.0.1';
		private $dbname = 'redpotio_nostone';
		private $dbuser = 'redpotio_nostone';
		private $dbpass = '}mN94VxJgDUe';*/
		
		
		
		//public $root = 'http://interaction.dundee.ac.uk/~alayt/sns/';
		public $root = 'http://127.0.0.1/Projects/Nostone/';
		//public $root = 'http://uni.sapphion.com/nostone/';
		public $icons = array(

array('Wood','<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="%%w%%" height="%%h%%" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve"><polygon fill="#3c3430" points="87.195,87 72.015,58 80.921,58 61.741,29 70.647,29 50.101,0 28.92,29 37.828,29 18.647,58   27.554,58 12.374,87 45,87 45,100 55,100 55,87 "/></svg>'),

array('Plastic','<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="%%w%%" height="%%h%%" viewBox="0 0 128 128" enable-background="new 0 0 128 128" xml:space="preserve">
<path fill="#3c3430" d="M94.592,65.008c-1.613-4.936-2.674-12.137-2.963-20.172c-0.264-7.309-0.455-14.983-0.455-14.984  c0-4.621-4.38-8.395-8.811-8.395c0,0-8.034-0.821-8.827-2.05c-0.39-0.605-0.67-2.786-0.67-2.786l-0.263-2.474H55.49l-0.478,3.345  c0,0-14.053,4.685-17.877,9.561c-6.232,7.947-5.162,36.234-5.162,36.234v49.949c0,4.623,3.592,8.369,8.022,8.369  c0,0,17.7,0.783,20.342,0c1.225-0.363,1.413-2.98,3.661-3.059c2.053-0.072,2.346,2.682,3.568,3.059c2.429,0.748,20.438,0,20.438,0  c4.432,0,8.023-3.746,8.023-8.369C96.028,113.236,96.572,71.064,94.592,65.008z M80.857,54.216c-2.28,0.11-4.24-2.113-4.379-4.964  l-0.822-17.023c-0.138-2.851,1.599-5.253,3.879-5.363c2.282-0.11,4.242,2.113,4.38,4.964l0.822,17.024  C84.875,51.705,83.138,54.106,80.857,54.216z"/>
<path fill="#3c3430" d="M72.765,10.716c0.191,0,0.347-0.151,0.347-0.337s-0.155-0.337-0.347-0.337h-0.187v-2.98  c0-0.561-0.401-1.014-0.899-1.014H56.322c-0.498,0-0.9,0.454-0.9,1.014v2.98h-0.186c-0.191,0-0.346,0.151-0.346,0.337  s0.155,0.337,0.346,0.337h0.186v0.644h-0.188c-0.113,0-0.205,0.089-0.205,0.2c0,0.109,0.092,0.199,0.205,0.199h0.188v1.227h17.156  v-1.227h0.188c0.113,0,0.204-0.089,0.204-0.199c0-0.11-0.091-0.2-0.204-0.2h-0.188v-0.644H72.765z"/>
</svg>'),

array('Books','<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="%%w%%" height="%%h%%" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
<g>
	<path fill="#3c3430" d="M64.008,72.381c4.002-3.149,12.23-11.582,15.089-21.179c-6.511-8.01-33.912-42.187-40.238-50.08   C38.212,8.613,31.63,24.377,20.21,29.646c-5.247,2.56-10.477,4.156-12.467,4.721l39.077,47.32   C51.235,80.263,59.958,75.56,64.008,72.381z"/>
	<g>
		<g>
			<path fill="#3c3430" d="M90.405,75.352c-6.5,3.781-13.381,7.281-20.674,9.929c-8.632,3.134-19.05,6.681-22.386,7.664v5.127     l43.046-15.479L90.405,75.352z"/>
			<polygon fill="#3c3430" points="6.891,35.865 6.891,50.088 45.703,97.945 45.736,82.902    "/>
		</g>
		<path fill="#3c3430" d="M88.717,70.42c-5.018,3.936-11.386,7.921-18.278,11.363c-6.521,3.266-20.879,7.668-23.093,8.339v1.144    c3.686-1.09,13.036-3.898,21.237-7.013c9.104-3.457,22.12-11.628,22.12-11.628L88.717,70.42z"/>
	</g>
	<path fill="#3c3430" d="M80.877,50.835l-0.114,0.403c-2.851,10.142-11.25,18.858-15.762,22.409   c-4.225,3.319-13.009,8.054-17.655,9.561v2.168c6.53-2.034,15.656-6.36,20.721-9.922c8.699-6.128,17.195-14.63,22.419-22.404   l0.047,0.036C84.648,46.442,51.938,9.001,49.818,6.309c-0.719,1.357-1.368,2.265-2.422,2.887   c10.832,13.508,28.598,35.647,33.217,41.314L80.877,50.835z"/>
	<path fill="#3c3430" d="M87.321,59.925c0,0-11.588,12.1-18.328,16.846c-5.696,4.008-14.5,7.942-21.647,10.168v1.498   c0.692-0.212,1.838-0.566,3.268-1.021c5.266-1.677,14.41-4.722,19.106-7.072c9.305-4.648,17.623-10.274,22.834-15.386   c0.054-0.053,0.106-0.106,0.161-0.16L87.321,59.925z"/>
</g>
</svg>'),

array('Paper','<svg xmlns="http://www.w3.org/2000/svg" fill="#3c3430" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" x="0px" y="0px" width="%%w%%" height="%%h%%" viewBox="0 0 100 100" overflow="" enable-background="new 0 0 100 100" xml:space="preserve">
    <path d="M87.989,14.304H43.423H27.825c-5.898,0-10.677,4.779-10.677,10.682v0.009h-5.435 c-3.706,0-6.969,1.894-8.884,4.766C1.676,31.462,1,33.523,1,35.735v0.004V68.34c0,11.236,5.188,18.838,17.81,18.838h69.18 c5.899,0,10.673-4.787,10.673-10.681V24.986C98.662,19.083,93.889,14.304,87.989,14.304z M12.537,75.321 c-2.543,0-4.606-2.072-4.606-4.621V35.348c0.345-1.552,1.733-2.721,3.395-2.721h5.822v7.883h-4.387v4.736h4.387v6.242h-4.387v4.738 h4.387v6.24h-4.387v4.741h4.387V70.7C17.148,73.249,15.086,75.321,12.537,75.321z M91.859,72.901h-0.018 c0,4.271-3.462,7.738-7.74,7.738l-0.004,0.018H18.873c4.111-0.18,7.392-3.561,7.392-7.722l0.013-47.523 c0-1.922,1.561-3.479,3.48-3.479H88.38c1.916,0,3.479,1.557,3.479,3.479V72.901z"/>
    <rect x="33.251" y="28.686" width="22.357" height="29.443"/>
    <rect x="62.636" y="28.529" width="22.35" height="4.512"/>
    <rect x="62.636" y="41.103" width="22.35" height="4.512"/>
    <rect x="62.636" y="53.672" width="22.35" height="4.512"/>
    <rect x="33.157" y="66.244" width="51.828" height="4.515"/>
</svg>'),

array('Seaside','<svg xmlns="http://www.w3.org/2000/svg" fill="#3c3430" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" id="Layer_1" x="0px" y="0px" width="%%w%%" height="%%h%%" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
<g id="Layer_1_1_">
</g>
<g>

	<path d="M59.527,94.471c-2.305,1.557-1.916,2.831,0.867,2.831h7.016c2.781,0,6.044-0.362,8.096-1.724   c1.6-1.061,3.035-8.253,3.035-11.036v-0.091c0-2.782-1.648-3.489-3.665-1.571L59.527,94.471z"/>
	<path d="M39.08,94.471c2.306,1.557,1.916,2.831-0.867,2.831h-7.015c-2.783,0-6.044-0.362-8.096-1.724   c-1.6-1.061-3.036-8.253-3.036-11.036v-0.091c0-2.782,1.649-3.489,3.665-1.571L39.08,94.471z"/>
	<path d="M0.994,59.039c-2.259-5.707,1.274-9.056,3.888-11.797c-4.609-8.074-0.179-18.657,11.991-17.663   c-3.192-12.902,9.533-20.514,19.732-11.992c2.553-9.304,19.663-14.706,26.72-0.333c10.958-8.189,23.206-0.577,19.464,12.325   c11.096-1.033,16.507,8.236,11.99,17.663c4.609,4.101,6.128,9.035,4.008,12.078c-2.094,3.007-45.941,38.266-49.23,38.266   C44.331,97.585,2.035,61.668,0.994,59.039z"/>

</g>
</svg>'),

array('Metal','
<svg xmlns="http://www.w3.org/2000/svg" fill="#3c3430" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="%%w%%" height="%%h%%" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
<g id="Layer_3" display="none">
	<g display="inline" opacity="0.39">
		
			</g>
</g>
<g id="Layer_2">
	<path d="M50.353,10.562c19.183,0.078,18.811,1.521,18.811,1.521s1.198-1.115-0.708-1.896S56.084,9.042,50.353,9.042   S34.156,9.406,32.25,10.188s-0.708,1.896-0.708,1.896S31.17,10.641,50.353,10.562"/>
	<path d="M50.353,12.062c19.183,0.078,18.493,1.391,18.493,1.391s-0.388,0.453,0.689,2.609c1.076,2.156,3.434,6.662,3.434,6.662   s-7.552-1.017-22.616-0.934c-15.158-0.083-15.005-0.091-22.616,0.934c0,0,2.357-4.506,3.434-6.662   c0.188-0.376,1.576-1.723,0.689-2.609C31.859,13.453,31.17,12.14,50.353,12.062"/>
	<path d="M50.353,80.458c22.019,0,22.853-1.708,22.853-1.708l0.08-54.398c0,0-7.868-1.175-22.933-1.092   c-15.064-0.083-22.933,1.092-22.933,1.092L27.5,78.75C27.5,78.75,28.333,80.458,50.353,80.458"/>
	<path d="M50.353,84.25C38.125,84.25,32,83.001,32,83.001c-4.208-1.083-4.5-2.625-4.5-2.625s0.834,1.708,22.853,1.708   c22.019,0,22.853-1.708,22.853-1.708s-0.291,1.542-4.5,2.625C68.705,83.001,62.58,84.25,50.353,84.25"/>
	<path d="M50.353,88.251C33.871,88.251,34,86.917,34,86.917l-1.343-2.104c0,0,5.469,1.27,17.696,1.27s17.696-1.27,17.696-1.27   l-1.344,2.104C66.705,86.917,66.834,88.251,50.353,88.251"/>
</g>
</svg>'),

array('Glass',' <svg xmlns="http://www.w3.org/2000/svg" fill="#3c3430" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="%%w%%" height="%%h%%" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
<path fill="#3c3430" d="M55.342,3.331c-0.292,0-0.529,0.236-0.529,0.528s0.237,0.529,0.529,0.529c-0.292,0-0.529,0.236-0.529,0.528  s0.237,0.528,0.529,0.528v3.172c-0.292,0-0.529,0.236-0.529,0.528s0.237,0.528,0.529,0.528v15.571c0,0,0.093,3.916,2.517,6.526  c2.425,2.61,4.941,6.293,4.988,13.192s0.094,50.068,0.094,50.068v0.373C62.94,97.942,57.146,100,50,100s-12.94-2.058-12.94-4.595  v-0.373c0,0,0.047-43.169,0.093-50.068c0.047-6.899,2.564-10.582,4.988-13.192s2.518-6.526,2.518-6.526l0-15.571  c0.292,0,0.529-0.236,0.529-0.528s-0.237-0.528-0.529-0.528V5.445c0.292,0,0.529-0.236,0.529-0.528s-0.237-0.528-0.529-0.528  c0.292,0,0.529-0.237,0.529-0.529s-0.237-0.528-0.529-0.528l-0.003-1.435C44.655,0.849,47.047,0,49.999,0  c2.95,0,5.342,0.849,5.342,1.896L55.342,3.331z"/>
</svg>'),

array('Natural','<svg xmlns="http://www.w3.org/2000/svg" fill="#3c3430" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="%%w%%" height="%%h%%" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
<g>
	<g>
		<path d="M94.445,13.185c0.007-0.2-79.815,20.211-52.331,60.886l2.481-2.875l0.038-0.079l5.274-29.741l-2.689,26.78l8.461-9.795    l4.155-23.435l-2.116,21.074l9.406-10.889L69.396,32.3l-1.157,11.521L87.147,21.93L69.312,44.583l11.424-3.428l-12.509,4.807    h-0.001l-8.871,11.266l20.62-6.186l-22.568,8.673l-0.004-0.009l-7.985,10.142l26.115-7.834L47.337,72.848l-0.179-0.136    l-2.662,3.381C90.14,95.858,94.642,13.14,94.445,13.185z"/>
		<path d="M43.097,75.435c-0.06-0.027-0.191-0.223-0.191-0.223c-0.275-0.382-0.537-0.763-0.792-1.141L33.586,84.2l2.614,2.156    l8.296-10.264c-0.378-0.164-0.76-0.334-1.143-0.512C43.354,75.581,43.136,75.488,43.097,75.435z"/>
	</g>
	<g>
		<path d="M12.03,26.37C11.914,26.31,1.468,78.645,32.922,73.99l-0.983-2.254l-0.036-0.044L16.013,60.279l14.887,9.073l-3.351-7.685    l-12.521-8.993l11.713,7.141l-3.723-8.544l-6.846-4.917l6.403,3.903l-7.485-17.177l8.23,16.764l1.2-7.632l-0.698,8.652h-0.001    l4.094,8.337l2.166-13.794L28.824,61h-0.006l3.685,7.521l2.742-17.436l-1.573,19.506l-0.129,0.069l1.228,2.503    C59.104,52.048,12.058,26.243,12.03,26.37z"/>
		<path d="M33.995,73.798c-0.033,0.028-0.184,0.05-0.184,0.05c-0.3,0.054-0.595,0.101-0.889,0.143l3.526,7.817l1.993-0.922    l-3.67-7.722c-0.202,0.176-0.408,0.352-0.619,0.525C34.152,73.689,34.037,73.791,33.995,73.798z"/>
	</g>
</g>
</svg>'),

array('Stone','<svg xmlns="http://www.w3.org/2000/svg" fill="#3c3430" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="%%w%%" height="%%h%%" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
<path fill="#3c3430" d="M88.904,48.56l-3.111-6.143l-1.381-6.167l-0.503-0.849l-2.996-2.625l-0.098-0.191l-1.513-1.221l-2.107-1.848  l-0.443-0.21l-0.679-0.548l-7.867-1.348l-0.548-1.865l-1.555-1.141l-9.367,0.178l-0.424,0.066l-0.831,0.248l-3.516-2.313  l-0.645,0.095l-0.944-0.65l-1.158-0.259l-18.414,3.004l-0.924,1.775l-2.372,0.979l-6.094,1.19l-0.774,1.647l-1.514,0.626  l-0.438,7.174l2.549,6.899l-7.1,2.872l-0.98,1.276l-0.607,4.868l0.14,0.874l0.971,2.06l-2.76,3.377l3.792,8.301l0.881,7.22  l23.026,2.319l24.54-3.895l19.747-11.002l6.208-6.951L88.904,48.56z M56.766,26.17l9.367-0.176l2.157,7.336l-13.803,2.281  l-9.198-6.009L56.766,26.17z M49.475,23.336l4.121,2.834l-4.203,0.171l-14.271,8.431l-4.062-8.431L49.475,23.336z M29.753,28.709  l4.864,7.213l-2.077,2.609l-7.054-1.388l-3.767-6.868L29.753,28.709z M37.063,67.779l-6.003-1.7l-11.251,0.246l-5.68-12.048  l0.606-4.87l10.751-4.347l15.819,18.075L37.063,67.779z M45.289,51.427l-8.731-10.599l8.731-4.726l7.135,3.426l5.177,7.662  L45.289,51.427z M63.117,50.175L54.624,39.72l15.729-2.766l-1.122-7.377l6.919,1.134l6.712,5.885l1.772,7.915L63.117,50.175z"/>
</svg>'),

array('Recycled Fabrics','<svg xmlns="http://www.w3.org/2000/svg" fill="#3c3430" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="%%w%%" height="%%h%%" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
<path fill="#3c3430" d="M20.284,99.473H77.74V37.007l4.561,4.104l15.047-18.24L82.3,6.455L62.693,0.527  c0,0-4.854,3.647-12.612,3.647c0,0-7.756,0.458-12.62-3.647L17.545,6.608L2.652,23.178l13.677,18.086l4.108-4.561L20.284,99.473z"/>
</svg>'),

array('Seeds and nuts','<svg version="1.0" id="Layer_1" fill="#3c3430" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="%%w%%" height="%%h%%" viewBox="0 0 68.629 100" enable-background="new 0 0 68.629 100" xml:space="preserve">
<path d="M37.731,21.442C36.088,9.35,25.698,0,13.163,0v7.286c8.546,0,15.677,6.156,17.203,14.266C21.347,23.411,0,28.602,0,36.076
	v0.464c0,5.827,2.907,10.971,7.346,14.072v17.42l0,0C7.346,82.928,19.42,100,34.315,100s26.969-17.072,26.969-31.967v-17.42
	c4.439-3.102,7.346-8.246,7.346-14.072v-0.464C68.629,28.45,46.407,23.201,37.731,21.442z"/>
</svg>'),

/*array('Add new','<svg xmlns="http://www.w3.org/2000/svg" fill="#3c3430" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="%%w%%" height="%%h%%" viewBox="0 0 96.4 92.286" enable-background="new 0 0 96.4 92.286" xml:space="preserve">
<path d="M82.7,0.643h-70c-5.523,0-10,4.477-10,10v70c0,5.522,4.477,10,10,10h70c5.523,0,10-4.478,10-10v-70  C92.7,5.12,88.223,0.643,82.7,0.643z M68.999,53.37H55.427v13.572c0,4.267-3.459,7.727-7.727,7.727s-7.727-3.46-7.727-7.727V53.37  H26.401c-4.268,0-7.727-3.459-7.727-7.727s3.459-7.727,7.727-7.727h13.572V24.344c0-4.268,3.459-7.727,7.727-7.727  s7.727,3.459,7.727,7.727v13.572h13.572c4.267,0,7.727,3.459,7.727,7.727S73.265,53.37,68.999,53.37z"/>
</svg>'),
	*/						  
							  
							  
							  );
		
		public function __construct(){
			$uname = 'alan';
			$upass = '';
		
			$this->connect();
			$this->user = new User($this->pdo,$this->root);
			
			if(isset($_POST['loginUser']) && isset($_POST['loginPass'])) {
				debug('Login POST data detected: ' . $_POST['loginUser']);
				
				if(false != $sessionKey = $this->user->auth($_POST['loginUser'],$_POST['loginPass'])){
					debug("Session initiated! key: ".$sessionKey);
					setcookie('username',$_POST['loginUser']);
					setcookie('key',$sessionKey);
					header("Location: ".$this->root);
				}
				else {
					debug('Invalid username or password.');
				}
			}
			else {
				if(isset($_SESSION['username'])) {
					debug('Login session detected: ' . $_SESSION['username']);
				}
				else {
					debug('Checking for cookies');
					if(isset($_COOKIE['username']) && isset($_COOKIE['key'])) {
						
						debug('Login cookie detected: ' . $_COOKIE['username']);
						if($this->user->authSession($_COOKIE['username'],$_COOKIE['key'])){
							session_start();
							$this->user->getDetails($_COOKIE['username']);
							debug('User authenticated: ' . $this->user->d['uname']);
							$this->authenticated();
						}
					}
					else
						debug('No cookies found.');
				}
			}
			
			if(isset($_GET['act'])){
				switch($_GET['act']){
					case 'logout':
						$this->logout();
						break;
					case 'register':
						$this->register();
						break;
				}
			}
			if(!$this->user->loggedIn())
				$this->loaded();
		
		} 
	
		public function authenticated() { 
		
			debug("Authenticated. Running.");
			$this->loaded();
		
		}
	
		public function loaded() { 
		
			debug("Loaded. Running.");
		//	if(isset($_GET['view'])){
				$viewDetails = $_GET;
				$this->view = new View($this,$viewDetails);
		//	}
		
		}
	
		public function logout() { 
		
			if($this->user->loggedIn()){
				$this->user->deleteSession();
				unset($_SESSION['username']);
				setcookie ('username', '', time() - 3600);
				setcookie ('key', '', time() - 3600);
				session_destroy();
				header("Location: ".$this->root);
			}
		} 
		public function register() { 
			$pwSalt = 'hogwaRts';
		
			if(
				isset($_POST['username']) &&
				isset($_POST['firstname']) &&
				isset($_POST['lastname']) &&
				isset($_POST['password']) &&
				isset($_POST['password2']) &&
				isset($_POST['email']) &&
				isset($_POST['dob'])
			){
				$this->regData['uname'] = $_POST['username'];
				$this->regData['firstname'] = $_POST['firstname'];
				$this->regData['lastname'] = $_POST['lastname'];
				$this->regData['pword'] = $_POST['password'];
				$this->regData['pword2'] = $_POST['password2'];
				$this->regData['email'] = $_POST['email'];
				$this->regData['dob'] = $_POST['dob'];
				
				if(strlen($_POST['username'])<4)
					echo "<p>Username too short.</p>";
				elseif(strlen($_POST['password'])<4)
					echo "<p>Password too short.</p>";
				elseif($_POST['password'] != $_POST['password2'])
					echo "<p>Passwords do not match.</p>";
				else {
					$st = $this->pdo->prepare('INSERT INTO login VALUES("", :uname, :password, :email, :first_name, :last_name, :dob)');
					$st->execute(array(
						':uname' => $this->regData['uname'],
						':password' => sha1($pwSalt.$this->regData['pword']),
						':email' => $this->regData['email'],
						':first_name' => $this->regData['firstname'],
						':last_name' => $this->regData['lastname'],
						':dob' => $this->regData['dob'],
					));
				}
			
			}
				
			//echo $_POST['username'];
			/*$st->execute(array(
				':uname' => $token,
				':password' => $token,
				':email' => $token,
				':first_name' => $token,
				':last_name' => $token,
				':dob' => $token,
			));
			debug('Initiating session: ' . $st->rowCount());
			
			if($st->rowCount()!=0)
				return $token;
			else
				return false;*/
		}
	
		public function connect() { 
			$this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->dbuser, $this->dbpass); 
		} 
		public function root() {
			echo $this->root; 
		}
	
		public function loginForm() { 
			return '
			<form method="post" action="'.$this->root.'?act=login">
				<input name="loginUser" type="text" placeholder="Username" \>
				<input name="loginPass" type="password" placeholder="Password" \>
				<input value="Login!" type="submit" \>
			</form>
			';
		
		}
	
		public function registerForm() { 
			return '
			<form method="post" action="?act=register">
				<input name="username" type="text" placeholder="Username" 
						'.(isset($this->regData['uname'])?'value="'.$this->regData['uname'].'"':'').' \>
						
				<input name="firstname" type="text" placeholder="First Name" 
						'.(isset($this->regData['firstname'])?'value="'.$this->regData['firstname'].'"':'').' \>
				<input name="lastname" type="text" placeholder="Last Name" 
						'.(isset($this->regData['lastname'])?'value="'.$this->regData['lastname'].'"':'').' \>
						
				<input name="password" type="password" placeholder="Password" 
						'.(isset($this->regData['pword'])?'value="'.$this->regData['pword'].'"':'').' \>
				<input name="password2" type="password" placeholder="Re-type password" 
						'.(isset($this->regData['pword2'])?'value="'.$this->regData['pword2'].'"':'').' \>
						
				<input name="email" type="email" placeholder="email@example.com" 
						'.(isset($this->regData['email'])?'value="'.$this->regData['email'].'"':'').' required \>
  				<input name="dob" type="date" 
						'.(isset($this->regData['dob'])?'value="'.$this->regData['dob'].'"':'').' placeholder="Date of birth" required>
				<input type="submit" \>
			</form>
			';
		
		} 
	
	} 
	
	
	
	
	class View { 
		private $viewroot='views';
		private $template;
		public function __construct($app,$viewDetails) {
			
			$this->template = $this->viewroot.'/404.php';
			
			if(isset($_GET['view']))
				$this->viewDetails = $viewDetails;
				
			$this->app = $app; 
			
		//	echo var_dump($viewDetails);
			
			debug("Loading View");
		
			if(isset($viewDetails['view'])) {
				switch($viewDetails['view']) {
					case 'post':
						$this->post();
						break;
					case 'uncover':
						$this->addPost();
						break;
					case 'user':
						$this->user();
						break;
					case 'materials':
						$this->materials();
						break;
					default:
					$this->home();
						break;
				}
			}
			else
				$this->home();
			
		}  
		
		public function user() {
			$this->userExists=false;
			if(isset($this->viewDetails['uid']))
				$user = $this->viewDetails['uid'];
			else
				$user = $this->viewDetails['uid'];
			
			debug("Loading user profile.");
			
			$this->user = new UserHandler($this->app->pdo,$this->app->root);
			if($this->user->getDetails($user))
				$this->userExists=true;
				
			$this->template = $this->viewroot.'/profile.php';
		}
		
		public function materials() {
			
			$this->template = $this->viewroot.'/materials.php';
			
		}
		
		public function addPost() { 
		
			debug("Loading add post page.");
		
			$this->template = $this->viewroot.'/add.php';
		} 
		
		public function home() { 
		
			debug("Loading home page.");
		
			$this->template = $this->viewroot.'/home.php';
		} 
		
		public function post() { 
			$this->postExists=false;
			debug("Loading post page: ".$this->viewDetails['post']);
			
			$this->post = new PostHandler($this->app,$this->viewDetails['post']);
			if($this->post->getDetails($this->viewDetails['post']))
				$this->postExists=true;
				
			$this->template = $this->viewroot.'/post.php';
		} 
		
		public function getTemplate() { 
		
			return $this->template;
		
		} 
		
	}
	
	
	
	
	
	class UserHandler { 
	
		public function __construct($pdo,$root) { 
			$this->pdo = $pdo;
			$this->root = $root;
		}  
		
		public function setDetails($user) { 
				$this->d = $user;
		} 


		public function getDetails($uname) { 
			$st = $this->pdo->prepare('SELECT * FROM login WHERE uname = :username');
			$st->execute(array(':username' => $uname));
			
			while ($user = $st->fetch()) {
				$this->d = $user;
				return true;
			}
			return false;
		}

		public function getPosts() { 
			$st = $this->pdo->prepare('SELECT * FROM posts WHERE uid = :uid');
			$st->execute(array(':uid' => $this->d['uid']));
			
			while ($post = $st->fetch()) {
				echo '<a href="'.$this->root.''.$this->d['uname'].'/post/'.$post['url'].'">'.$post['title'].'</a><br />';
				//$this->d = $user;
				//return true;
			}
			return false;
		} 
		
		public function getAvatar($class) { 
			$params = '';
			if($class!='')
				$params .= 'class="'.$class.'" ';
			
			
			return '<img '.$params.'src="'.$this->root.'avatar/'.$this->d['uid'].'.jpg" \>';
		
		} 
	
		public function getId() { 
			return '<span class="username">'.$this->d['uid'].'</span>';
		
		} 
	
		public function getUsername() { 
			return '<span class="username">'.$this->d['uname'].'</span>';
		
		} 
	
		public function getFirstName() { 
			return '<span class="firstname">'.$this->d['first_name'].'</span>';
		
		}
	
		public function getLastName() { 
			return '<span class="lastname">'.$this->d['last_name'].'</span>';
		
		}  
	
	} 
	
	
	
	
	class PostHandler { 
	
		public function __construct($app,$url) { 
		//	$this->pdo = $pdo;
		//	$this->root = $app->root;
		
			$this->app = $app;
		}  

		public function getDetails($id) { 
			$st = $this->app->pdo->prepare('SELECT * FROM posts,login WHERE posts.uid = login.uid AND posts.url = :url');
			$st->execute(array(':url' => $id));
			
			debug("Getting post details");
			while ($post = $st->fetch()) {
				
				$st2 = $this->app->pdo->prepare('SELECT * FROM images WHERE images.pid = :pid');
				$st2->execute(array(':pid' => $post['pid']));
				
				debug("Getting post details");
				//while ($post = $st->fetchAll()) {
					$this->images = $st2->fetchAll();
				//}
				$this->d = $post;
				return true;
			}
			//debug());
			return false;
		} 
	
		public function getUserName() { 
			return ''.$this->d['uname'].'';
		
		} 
		public function getAll() { 
			echo var_dump($this->images);
		}
		public function getImages() { 
			return $this->images;
		}
		public function getMatName() { 
			return $this->app->icons[$this->d['material']][0];
		}
		public function getMatSVG($size) { 
		$svg = str_replace(array("\n\r","\r","\n"),'',str_replace('%%w%%','32px',str_replace('%%h%%','32px',$this->app->icons[$this->d['material']][1])));
			return $svg;
		}
	
		public function getTitle() { 
			return ''.$this->d['title'].'';
		
		} 
	
		public function getBody() { 
			return ''.$this->d['body'].'';
		
		} 
	
		public function getDate() { 
			return ''.date("d/m/y",$this->d['date']).'';
		
		} 
	
		public function getLat() { 
			return ''.$this->d['lat'].'';
		
		} 
	
		public function getLon() { 
			return ''.$this->d['lon'].'';
		
		} 
		
	} 
	
	class User extends UserHandler{ 
		private static $instance; 
		private $authed = false;
		private $pwSalt = 'hogwaRts';
		
		/*public function __construct($pdo,$root) { 
			$this->pdo = $pdo;
			$this->root = $root;
		} */ 
		
		public function authed($is,$key) { 
			$this->authed = $is;
			$this->sessionKey = $key;
		}
		public function loggedIn() { 
			return $this->authed;
		} 
		
		public function auth($username,$password) { 
			$st = $this->pdo->prepare('SELECT * FROM login WHERE uname = :username AND password = :password');
			$st->execute(array(':username' => $username,':password' => sha1($this->pwSalt.$password)));
			
			debug('Searching for user: ' . $username);
			while ($user = $st->fetch()) {
				$this->setDetails($user);
				$key = $this->createSession();
				$this->authed(true,$key);
				return $this->sessionKey;
			}
			return false;
		}
		
		
		// ==== SESSION HANDLERS ==== \\
		public function createSession() { 
			$token = sha1(uniqid(mt_rand(), true));
			$st = $this->pdo->prepare('INSERT INTO session VALUES("", :key, :uid, :ip, 1, :time)');
			$st->execute(array(
				':key' => $token,
				':uid' => $this->d['uid'],
				':ip' => $_SERVER['REMOTE_ADDR'],
				':time' => time()
			));
			debug('Initiating session: ' . $st->rowCount());
			
			if($st->rowCount()!=0)
				return $token;
			else
				return false;
		}
		
		public function authSession($uname,$key) { 
			$st = $this->pdo->prepare('SELECT * FROM session, login WHERE login.uname = :uname AND session.key = :key AND session.uid = login.uid');
			$st->execute(array(
				':uname' => $uname,
				':key' => $key
			));
			debug('Authenticating session: ' . $uname . ': ' . $key );
			debug('Auth result: ' . $st->rowCount() );
			
			if($st->rowCount()!=0){
				$this->authed(true,$key);
				return true;
			}
			else
				return false;
		}
		
		public function deleteSession() { 
			$st = $this->pdo->prepare('DELETE FROM session WHERE uid = :uid AND `key` = :key');
			$st->execute(array(
				':uid' => $this->d['uid'],
				':key' => $this->sessionKey
			));
			debug('Removing session: ' . $this->d['uid'] . ': ' . $this->sessionKey );
			debug('Removed?: ' . $st->rowCount() );
			
			if($st->rowCount()!=0){
				$this->authed(false,'');
				return true;
			}
			else
				return false;
		}
		
	
	} 
	
	
	
function getTopPosts() { 
global $app;
	$st = $app->pdo->prepare('SELECT * FROM posts,login WHERE posts.uid = login.uid');
	$st->execute();
	
	while ($post = $st->fetch()) {
		//$this->d = $user;
		echo '<a href="'.$app->root.''.$post['uname'].'/post/'.urlencode($post['url']).'">'.$post['title'].'</a><br />';
		//return true;
	}
	return false;
} 
	
	
function getRandomThumbs($limit) { 
	global $app;
	$st = $app->pdo->prepare('SELECT * FROM posts,images,login WHERE posts.pid = images.pid AND posts.uid = login.uid AND images.cover=1 ORDER BY date DESC LIMIT '.$limit);
	$st->execute();
	
	return $post = $st->fetchAll();
} 
	
	
	
	
	
	
$GLOBALS['de'] = '';
function debug($t){	
	$GLOBALS['de'] .= $t.'<br/>';
}

?>