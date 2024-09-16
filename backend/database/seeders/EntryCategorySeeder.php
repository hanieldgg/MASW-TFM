<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntryCategorySeeder extends Seeder {
	/**
	 * Run the database seeds.
	 */
	public function run(): void {

		$json = '[
 {
   "title": "911. Team’s Body of Work Achievement",
   "parent": "Team Achievement",
   "main": "Achievement",
   "price": 250
 },
 {
   "title": "901. Individual’s Body of Work Achievement",
   "parent": "Individual Achievement",
   "main": "Achievement",
   "price": 250
 },
 {
   "title": "668. Outstanding Production",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "667. Outstanding Guest(s)",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "666. Outstanding Host(s)",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "664c. Medical Series",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "663c. Marketing Product/Service Series",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "662c. Internal Communication Series",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "661c. Informational Series",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "660c. Industry Focused Series",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "659c. Entertainment Series",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "658c. Educational Series",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "656. Medical Single Episode",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "655. Marketing Product/Service Single Episode",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "654. Internal Communication Single Episode",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "653. Informational Single Episode",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "652. Industry Focused Single Episode",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "651. Entertainment Single Episode",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "650. Educational Single Episode",
   "parent": "Podcast",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "632c. Series",
   "parent": "Digital Video Creation",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "621c. Series",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "602c. Series",
   "parent": "Television",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "498c. Series",
   "parent": "Web Video",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "325. Media Kit",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "319. Infographic",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "294c. Medical Series",
   "parent": "Blog",
   "main": "Publications",
   "price": 195
 },
 {
   "title": "293c. Internal Communication Series",
   "parent": "Blog",
   "main": "Publications",
   "price": 195
 },
 {
   "title": "292c. Informational Series",
   "parent": "Blog",
   "main": "Publications",
   "price": 195
 },
 {
   "title": "291c. Industry Focused Series",
   "parent": "Blog",
   "main": "Publications",
   "price": 195
 },
 {
   "title": "290c. Entertainment Series",
   "parent": "Blog",
   "main": "Publications",
   "price": 195
 },
 {
   "title": "289c. Educational Series",
   "parent": "Blog",
   "main": "Publications",
   "price": 195
 },
 {
   "title": "288c. Product/Service Series",
   "parent": "Blog",
   "main": "Publications",
   "price": 195
 },
 {
   "title": "286. Medical Single Post",
   "parent": "Blog",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "285. Internal Communication Single Post",
   "parent": "Blog",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "284. Informational Single Post",
   "parent": "Blog",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "283. Industry Focused Single Post",
   "parent": "Blog",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "282. Entertainment Single Post",
   "parent": "Blog",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "281. Educational Single Post",
   "parent": "Blog",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "280. Product/Service Single Post",
   "parent": "Blog",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "266. Nonprofit",
   "parent": "External Newsletter",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "265. Industry",
   "parent": "External Newsletter",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "264. Healthcare",
   "parent": "External Newsletter",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "263. Government",
   "parent": "External Newsletter",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "262. Educational Institution",
   "parent": "External Newsletter",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "261. Corporate",
   "parent": "External Newsletter",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "260. Association",
   "parent": "External Newsletter",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "275. Thought Leadership",
   "parent": "Book (Business Related)",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "274. Motivational",
   "parent": "Book (Business Related)",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "273. Marketing",
   "parent": "Book (Business Related)",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "272. Educational",
   "parent": "Book (Business Related)",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "271. Company History",
   "parent": "Book (Business Related)",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "270. Biography",
   "parent": "Book (Business Related)",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "109c. Viral Marketing Campaign",
   "parent": "Marketing/Promotion Campaign",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "67c. HR Campaign",
   "parent": "Email Communication",
   "main": "Advertising/Marketing",
   "price": 195
 },
 {
   "title": "66c. Email Campaign",
   "parent": "Email Communication",
   "main": "Advertising/Marketing",
   "price": 195
 },
 {
   "title": "65. Products",
   "parent": "Email Communication",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "64. Marketing",
   "parent": "Email Communication",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "63. Curated Content",
   "parent": "Email Communication",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "62. Company Information",
   "parent": "Email Communication",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "61. Benefits",
   "parent": "Email Communication",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "60. Announcements",
   "parent": "Email Communication",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "57. Social Media Marketing Campaign $195)",
   "parent": "Online",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "56. SEM Campaign ( $195)",
   "parent": "Online",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "55. Video Ad",
   "parent": "Online",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "54. Pre-Roll Video Ad",
   "parent": "Online",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "53. Native Advertising (Sponsored Posts)",
   "parent": "Online",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "52. Display Ad Video or Animated",
   "parent": "Online",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "51. Display Ad",
   "parent": "Online",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "50. Display Ad Campaign",
   "parent": "Online",
   "main": "Advertising/Marketing",
   "price": 195
 },
 {
   "title": "304. Annual Report / CSR Interior",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "305. Benefits/HR Materials",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "308. Brochure",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "307. Brochure Cover",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "309. Business Card",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "310. Calendar",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "311. Cartoon",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "312. Direct Mail",
   "parent": "Direct Mail",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "316. Holiday Card",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "37. Poster",
   "parent": "Marketing/Promotion/Materials",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "34. Invitation",
   "parent": "Marketing/Promotion/Materials",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "32. Guide",
   "parent": "Marketing/Promotion/Materials",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "9. Mall/Airport/Station",
   "parent": "Ads",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "33. Holiday Card",
   "parent": "Marketing/Promotion/Materials",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "31. Calendar",
   "parent": "Marketing/Promotion/Materials",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "30. Book",
   "parent": "Marketing/Promotion/Materials",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "36. Postcard",
   "parent": "Marketing/Promotion/Materials",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "38. Promotional Item",
   "parent": "Marketing/Promotion/Materials",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "303. Annual Report / CSR Cover",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "10. Newspaper",
   "parent": "Ads",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "302. Annual Report / CSR",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "300. Ad",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "39. Specialty Item",
   "parent": "Marketing/Promotion/Materials",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "40. T-Shirt",
   "parent": "Marketing/Promotion/Materials",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "224. Recruitment",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "225. Sales Promotion",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "226. Special Events",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "227. Viewbook",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "6. Door Hanger",
   "parent": "Ads",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "240. Benefits",
   "parent": "Employee Publication",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "223. Public Relations",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "222. Pamphlet",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "221. Nonprofit",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "220. Newspaper Supplement",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "219. Informational",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "218. Handbook",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "5. Business/Trade Publication",
   "parent": "Ads",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "217. Fund Raising",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "216. Educational",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "215. Consumer Awareness",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "241c. Benefits Campaign",
   "parent": "Employee Publication",
   "main": "Publications",
   "price": 195
 },
 {
   "title": "242. Internal Communication",
   "parent": "Employee Publication",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "8. Magazine",
   "parent": "Ads",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "258. Trade",
   "parent": "Magazine",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "257. Special Edition",
   "parent": "Magazine",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "256. Nonprofit",
   "parent": "Magazine",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "255. Industry",
   "parent": "Magazine",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "254. Government",
   "parent": "Magazine",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "253. Educational Institution",
   "parent": "Magazine",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "252. Corporate",
   "parent": "Magazine",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "251. Consumer",
   "parent": "Magazine",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "243. Internal Magazine",
   "parent": "Employee Publication",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "244. Internal Newsletter",
   "parent": "Employee Publication",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "245. Manual/Training",
   "parent": "Employee Publication",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "246. Special Edition",
   "parent": "Employee Publication",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "250. Association",
   "parent": "Magazine",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "7. Flyer",
   "parent": "Ads",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "646c. Ad Campaign",
   "parent": "Audio/Radio",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "645. Single Spot",
   "parent": "Audio/Radio",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "642c. PSA Campaign",
   "parent": "Audio/Radio",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "641. PSA",
   "parent": "Audio/Radio",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "210. Business to Business",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "644. Radio Promotion",
   "parent": "Audio/Radio",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "643. Radio Program",
   "parent": "Audio/Radio",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "214. Company Overview",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "213. Catalog",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "212. Capabliities",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "211. Business to Consumer",
   "parent": "Brochure",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "910. Team’s Specific Project Achievement",
   "parent": "Team Achievement",
   "main": "Achievement",
   "price": 250
 },
 {
   "title": "900. Individual’s Specific Project Achievement",
   "parent": "Individual Achievement",
   "main": "Achievement",
   "price": 250
 },
 {
   "title": "611. Fund Raiser",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "612. Government",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "613. Informational",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "614. Internal Communication",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "615. Marketing (Product or Service)",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "616. Medical",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "610. Educational Institution",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "609. Documentary",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "608. Corporate Image",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "206. Nonprofit",
   "parent": "Annual Report",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "606c. Ad Campaign",
   "parent": "Television",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "605. Single Spot",
   "parent": "Television",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "604c. PSA Campaign",
   "parent": "Television",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "603. PSA",
   "parent": "Television",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "4. Billboard",
   "parent": "Ads",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "207. Utility",
   "parent": "Annual Report",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "617. Meeting Open/Close",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "640. Original Music",
   "parent": "Audio/Radio",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "634. Virtual / Augmented / Mixed Reality",
   "parent": "Digital Video Creation",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "633. Virtual Tour",
   "parent": "Digital Video Creation",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "635. White Board Video",
   "parent": "Digital Video Creation",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "631. Motion Graphic Video",
   "parent": "Digital Video Creation",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "630. Animation",
   "parent": "Digital Video Creation",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "624. Video Script",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "623. Training",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "622. Special Event",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "620. Recruitment",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "619. Powerpoint Presentation",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "618. Nonprofit",
   "parent": "Video/Film",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "601. Promotion",
   "parent": "Television",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "600. Program",
   "parent": "Television",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "379. Web Content",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "364. Blog Single Post",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "363. Blog Overall",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "205. Medical",
   "parent": "Annual Report",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "336. Social Media Site",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "204. Government",
   "parent": "Annual Report",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "328. Mobile Website",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "327c. Mobile App",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 195
 },
 {
   "title": "313. E-Communication",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "306. Blog",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "339. Website",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "342. Website Redesign",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "340. Website Home Page",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "338. Web Interactive Capabilities",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "315. Graphics",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "301. Animation",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "314c. Games, Contests",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 195
 },
 {
   "title": "341. Website Interior",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "478. Microsite Information",
   "parent": "Web Element",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "479. Microsite Product",
   "parent": "Web Element",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "470. E-Commerce",
   "parent": "Web Element",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "471c. E-Learning",
   "parent": "Web Element",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "472c. Games/Contests",
   "parent": "Web Element",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "474. Infographic",
   "parent": "Web Element",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "477. Microsite Event",
   "parent": "Web Element",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "481. Portal",
   "parent": "Web Element",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "480. Podcast",
   "parent": "Web Element",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "475. Intranet",
   "parent": "Web Element",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "200. Association",
   "parent": "Annual Report",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "476. Landing Page",
   "parent": "Web Element",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "473. Home Page",
   "parent": "Web Element",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "201. Corporation",
   "parent": "Annual Report",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "482. Streaming Video",
   "parent": "Web Element",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "483. Web-based Training",
   "parent": "Web Element",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "203. Educational Institution",
   "parent": "Annual Report",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "500. YouTube Video",
   "parent": "Web Video",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "499. Training",
   "parent": "Web Video",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "497. Self Promotion",
   "parent": "Web Video",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "496. Overview",
   "parent": "Web Video",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "494. Medical",
   "parent": "Web Video",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "493. Marketing",
   "parent": "Web Video",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "490. Educational",
   "parent": "Web Video",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "491. Event",
   "parent": "Web Video",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "495. Nonprofit",
   "parent": "Web Video",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "202. Corporate Social Responsibility",
   "parent": "Annual Report",
   "main": "Publications",
   "price": 125
 },
 {
   "title": "492. Informational",
   "parent": "Web Video",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "461. Social Video",
   "parent": "Social Media",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "459. Social Content",
   "parent": "Social Media",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "457c. Social Branding Campaign",
   "parent": "Social Media",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "460c. Social Engagement",
   "parent": "Social Media",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "456c. Social Ad Campaign",
   "parent": "Social Media",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "458c. Social Campaign",
   "parent": "Social Media",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "444. Mobile/Other",
   "parent": "Mobile App/Web",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "443. Mobile Experience Information",
   "parent": "Mobile App/Web",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "451. Facebook Site",
   "parent": "Social Media",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "450. Facebook Engagement",
   "parent": "Social Media",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "455. LinkedIn Site",
   "parent": "Social Media",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "464. YouTube Video",
   "parent": "Social Media",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "452. Influencer Content",
   "parent": "Social Media",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "453. Instagram Engagement",
   "parent": "Social Media",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "454. Instagram Site",
   "parent": "Social Media",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "23c. Direct Mail Campaign",
   "parent": "Direct Mail",
   "main": "Advertising/Marketing",
   "price": 195
 },
 {
   "title": "462. Twitter Engagement",
   "parent": "Social Media",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "463. Twitter Site",
   "parent": "Social Media",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "404. Corporation",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "405. Educational Institution",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "406. Entertainment",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "407. Event",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "408. Financial Services",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "409. Government",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "410. Informational",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "411. Legal",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "24. Flyer",
   "parent": "Direct Mail",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "401. Benefits",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "155. Television Placement",
   "parent": "Media Relations/Publicity",
   "main": "Strategic Communications",
   "price": 125
 },
 {
   "title": "154c. Publicity Campaign",
   "parent": "Media Relations/Publicity",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "151c. Media Response",
   "parent": "Media Relations/Publicity",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "402. Business to Business",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "403. Business to Consumer",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "418. Redesign (upload old site as document)",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "400. Association",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "412. Manufacturer",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "413. Marketing, PR, Advertising Agency",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "21. Brochure",
   "parent": "Direct Mail",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "3. Bench/Shelter/Mass Transit",
   "parent": "Ads",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "25. Postcard",
   "parent": "Direct Mail",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "433c. App for Training/Learning",
   "parent": "Mobile App/Web",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "434c. App for Product",
   "parent": "Mobile App/Web",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "435c. App for Service",
   "parent": "Mobile App/Web",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "440. Mobile Website Company",
   "parent": "Mobile App/Web",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "441. Mobile Website Service",
   "parent": "Mobile App/Web",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "442. Mobile Buying Experience",
   "parent": "Mobile App/Web",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "432c. App for Information",
   "parent": "Mobile App/Web",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "431c. App for Entertainment",
   "parent": "Mobile App/Web",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "414. Medical",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "415. Municipality",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "416. Nonprofit",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "417. Professional Service",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "419. Small Business",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "420. Tourism",
   "parent": "Website",
   "main": "Video/Audio",
   "price": 125
 },
 {
   "title": "430c. App for Business",
   "parent": "Mobile App/Web",
   "main": "Video/Audio",
   "price": 195
 },
 {
   "title": "126c. Research/Study",
   "parent": "Communications/Public Relations",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "20. Bill Insert",
   "parent": "Direct Mail",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "125c. Public Relations Program",
   "parent": "Communications/Public Relations",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "124c. Internal Communication Campaign",
   "parent": "Communications/Public Relations",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "123c. Crisis Communication Plan/Response",
   "parent": "Communications/Public Relations",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "122c. Corporate Social Responsibility",
   "parent": "Communications/Public Relations",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "121c. Communication Program",
   "parent": "Communications/Public Relations",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "120c. Communication Plan",
   "parent": "Communications/Public Relations",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "127c. Social Media Campaign",
   "parent": "Communications/Public Relations",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "128c. Special Event",
   "parent": "Communications/Public Relations",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "152. Newspaper Placement",
   "parent": "Media Relations/Publicity",
   "main": "Strategic Communications",
   "price": 125
 },
 {
   "title": "22. Catalog",
   "parent": "Direct Mail",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "150. Magazine Placement",
   "parent": "Media Relations/Publicity",
   "main": "Strategic Communications",
   "price": 125
 },
 {
   "title": "153. Online Placement",
   "parent": "Media Relations/Publicity",
   "main": "Strategic Communications",
   "price": 125
 },
 {
   "title": "142c. Special Event",
   "parent": "Media Kit",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "141c. Product/Service Launch",
   "parent": "Media Kit",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "140c. Marketing/Promotion",
   "parent": "Media Kit",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "361. Advertorial",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "362. Annual Report/CSR",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "365. Brand Journalism",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "369. Editorial",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "15. Trade Show Exhibit",
   "parent": "Ads",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "366. Brochure",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "367. Column",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "368. Communication Plan",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "360. Ad Copy",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "376. Speech",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "350. Advertising",
   "parent": "Photography",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "351. Annual Report",
   "parent": "PublicationsPhotography",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "14. Poster",
   "parent": "Ads",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "352. Brochure",
   "parent": "Photography",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "353. Calendar",
   "parent": "Photography",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "354. Magazine",
   "parent": "Photography",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "355. People/Portrait",
   "parent": "Photography",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "356. Product",
   "parent": "Photography",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "370. Feature Article",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "371. Magazine",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "103c. Digital Marketing",
   "parent": "Marketing/Promotion Campaign",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "104c. Integrated Marketing",
   "parent": "Marketing/Promotion Campaign",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "105c. Product Launch",
   "parent": "Marketing/Promotion Campaign",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "1c. Advertising Campaign",
   "parent": "Ads",
   "main": "Advertising/Marketing",
   "price": 195
 },
 {
   "title": "106c. Promotion/Marketing Materials",
   "parent": "Marketing/Promotion Campaign",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "107c. Self Promotion",
   "parent": "Marketing/Promotion Campaign",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "108c. Special Event",
   "parent": "Marketing/Promotion Campaign",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "102c. Branding Refresh",
   "parent": "Marketing/Promotion Campaign",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "101c. Branding",
   "parent": "Marketing/Promotion Campaign",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "372. Marketing Material",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "373. News Article",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "375. Newsletter",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "374. News Release",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "377. Technical",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "378. White Paper",
   "parent": "Writing",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "100c. Benefits/HR Materials",
   "parent": "Marketing/Promotion Campaign",
   "main": "Strategic Communications",
   "price": 195
 },
 {
   "title": "324. Magazine Interior",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "323. Magazine Cover",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "322. Magazine",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "321. Logo",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "317. Identity Suite",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "320. Invitation",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "318. Illustration/Graphic Design",
   "parent": "Creativity (Print or Digital)Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "11. Newspaper Insert",
   "parent": "Ads",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "2. Banner/Sign",
   "parent": "Ads",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "35. Media Kit",
   "parent": "Marketing/Promotion/Materials",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "326. Menu",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "337. T-Shirt",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "334. Program Guide",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "333. Poster",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "332. Postcard",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "331. Packaging",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "335. Promotional Item",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "330. Newsletter Cover",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "13. Point of Purchase",
   "parent": "Ads",
   "main": "Advertising/Marketing",
   "price": 125
 },
 {
   "title": "329. Newsletter",
   "parent": "Design",
   "main": "Creativity (Print or Digital)",
   "price": 125
 },
 {
   "title": "12. Outdoor",
   "parent": "Ads",
   "main": "Advertising/Marketing",
   "price": 125
 }
]';

		$json = json_decode( $json, true );

		$main_categories = array_column( $json, 'main' );
		$main_categories = array_unique( $main_categories );

		foreach ( $main_categories as $mainKey => $main ) {
			DB::table( 'entry_categories' )->insert( [ 
				'title' => $main,
				'price' => 0,
			] );
		}

		$parent_categories = array();

		foreach ( $json as $jsonKey => $item ) {
			$newParent = array(
				'parent' => $item['parent'],
				'main' => $item['main']
			);

			if ( ! in_array( $newParent, $parent_categories ) ) {
				array_push( $parent_categories, $newParent );
			}

		}

		foreach ( $parent_categories as $parentKey => $parent ) {
			$query = DB::table( 'entry_categories' )
				->select( 'id' )
				->where( 'title', 'LIKE', $parent['main'] )->get()[0];

			DB::table( 'entry_categories' )->insert( [ 
				'title' => $parent['parent'],
				'price' => 0,
				'parent_id' => $query->id,
			] );
		}

		foreach ( $json as $jsonKey => $item ) {
			$query = DB::table( 'entry_categories' )
				->select( 'id' )
				->where( 'title', 'LIKE', $item['parent'] )->get()[0];

			DB::table( 'entry_categories' )->insert( [ 
				'title' => $item['title'],
				'price' => $item['price'],
				'parent_id' => $query->id,
			] );
		}


	}
}
