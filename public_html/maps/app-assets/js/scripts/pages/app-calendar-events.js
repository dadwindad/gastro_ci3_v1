/**
 * App Calendar Events
 */

"use strict";

var date = new Date();
var nextDay = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
// prettier-ignore
var nextMonth = date.getMonth() === 11 ? new Date(date.getFullYear() + 1, 0, 1) : new Date(date.getFullYear(), date.getMonth() + 1, 1);
// prettier-ignore
var prevMonth = date.getMonth() === 11 ? new Date(date.getFullYear() - 1, 0, 1) : new Date(date.getFullYear(), date.getMonth() - 1, 1);

var events = [];

// $.ajax({
// 	url: "/maps/app-assets/js/pages/calendar-events.json",
// 	dataType: "json",
// 	success: function (data) {
// 		// events = JSON.parse(data);
// 		events = data;
// 		console.log(data);
// 		// You can now work with the JSON object
// 	},
// 	error: function (xhr, textStatus, errorThrown) {
// 		console.error("Error loading the text file:", errorThrown);
// 	},
// });

events = [
	{
		id: 2,
		url: "",
		title: "ส่งท้ายปีเก่า",
		start: new Date(date.getFullYear(), 12, -0),
		end: new Date(date.getFullYear(), 12, -0),
		allDay: true,
		extendedProps: {
			calendar: "inter",
		},
	},
	{
		id: 3,
		url: "",
		title: "ต้อนรับปีใหม่",
		start: new Date(date.getFullYear() + 1, 1, -30),
		end: new Date(date.getFullYear() + 1, 1, -30),
		allDay: true,
		extendedProps: {
			calendar: "inter",
		},
	},
	{
		id: 4,
		url: "",
		title: "เทศกาล Hua Hin International Jazz Festival 2022",
		start: new Date(2022, 12, -29),
		end: new Date(2022, 12, -29),
		allDay: true,
		extendedProps: {
			calendar: "eastern",
		},
	},
	{
		id: 5,
		url: "",
		title: "สีสันแห่งดอยตุง",
		start: new Date(2022, 12, -29),
		end: new Date(2022, 12, -29),
		allDay: true,
		extendedProps: {
			calendar: "northern",
		},
	},
	{
		id: 6,
		url: "",
		title: "งานรักอ่าวลึก",
		start: new Date(2022, 12, -26),
		end: new Date(2022, 12, -26),
		allDay: true,
		extendedProps: {
			calendar: "southern",
		},
	},
	{
		id: 7,
		url: "",
		title: "ประเพณีไหลแพไฟเฉลิมพระเกียรติและพิธีขอบคุณพืชพันธุ์ธัญญาหาร",
		start: new Date(2022, 12, -26),
		end: new Date(2022, 12, -26),
		allDay: true,
		extendedProps: {
			calendar: "northern",
		},
	},
	{
		id: 8,
		url: "",
		title: "งานบรรเลงดนตรี - แสดงนาฏศิลป์ไทย และศิลปวัฒนธรรมไทย",
		start: new Date(2022, 12, -26),
		end: new Date(2022, 12, -26),
		allDay: true,
		extendedProps: {
			calendar: "central",
		},
	},
	{
		id: 9,
		url: "",
		title: "Field For Fun ไร่วนาทิพย์ HutZa Cafe หัวหิน",
		start: new Date(2022, 12, -26),
		end: new Date(2022, 12, -26),
		allDay: true,
		extendedProps: {
			calendar: "eastern",
		},
	},
	{
		id: 10,
		url: "",
		title: "วันพ่อแห่งชาติ",
		start: new Date(date.getFullYear(), 12, -26),
		end: new Date(date.getFullYear(), 12, -26),
		allDay: true,
		extendedProps: {
			calendar: "thai",
			description: "Lecture",
		},
	},
	{
		id: 11,
		url: "",
		title: "งานฉลองสมโภชศาลหลักเมือง และจังหวัดนนทบุรีครบ 473 ปี",
		allDay: true,
		start: new Date(2022, 12, -30),
		end: new Date(2022, 12, -30),
		extendedProps: {
			calendar: "central",
		},
	},
	{
		id: 12,
		url: "",
		title: "งานประจำปีทุ่งศรีเมืองจังหวัดอุดรธานี ประจำปี 2565",
		allDay: true,
		start: new Date(2022, 12, -30),
		end: new Date(2022, 12, -30),
		extendedProps: {
			calendar: "issan",
		},
	},
	{
		id: 13,
		url: "",
		title: "กาดฮิมน้ำกก",
		allDay: true,
		start: new Date(2022, 12, -29),
		end: new Date(2022, 12, -29),
		extendedProps: {
			calendar: "northern",
		},
	},
	{
		id: 14,
		url: "",
		title: "หัวหิน รักษ์เล RUN-FUN-WALK",
		start: new Date(2022, 12, -25),
		end: new Date(2022, 12, -25),
		allDay: true,
		extendedProps: {
			calendar: "eastern",
		},
	},
	{
		id: 15,
		url: "",
		title: "งานนมัสการพระแท่นดงรัง ณ วัดพระแท่นดงรังวรวิหาร อำเภอท่ามะกา",
		start: new Date(2023, 3, -30),
		end: new Date(2023, 3, -30),
		allDay: true,
		extendedProps: {
			calendar: "central",
		},
	},
	{
		id: 16,
		url: "",
		title: "กิจกรรมส่งเสริมตลาดวัฒนธรรมจังหวัดสตูล Satun Street Show 2023",
		start: new Date(2023, 3, -13),
		end: new Date(2023, 3, -13),
		allDay: true,
		extendedProps: {
			calendar: "southern",
		},
	},
	{
		id: 17,
		url: "",
		title: "งานโคบาลเลาขวัญ จังหวัดกาญจนบุรี",
		start: new Date(2023, 3, -12),
		end: new Date(2023, 3, -12),
		allDay: true,
		extendedProps: {
			calendar: "central",
		},
	},
	{
		id: 18,
		url: "",
		title: "แห่ผ้าห่มพระธาตุศรีสุราษฎร",
		start: new Date(2023, 3, -11),
		end: new Date(2023, 3, -11),
		allDay: true,
		extendedProps: {
			calendar: "southern",
		},
	},
	{
		id: 19,
		url: "",
		title: "กิจกรรมแข่งขันสุขภาพ ๒๕๖๖ เซนทัลหาดใหญ่",
		start: new Date(2023, 3, -1),
		end: new Date(2023, 3, -1),
		allDay: true,
		extendedProps: {
			calendar: "southern",
		},
	},
	{
		id: 20,
		url: "",
		title: "การปิดทอง ประจำปี หลวงพ่อโตวัดป่าเลไลยก์ ประจำปี 2566",
		start: new Date(2023, 3, -5),
		end: new Date(2023, 3, -5),
		allDay: true,
		extendedProps: {
			calendar: "central",
		},
	},
	{
		id: 21,
		url: "",
		title: "งานกาชาดมะม่วงแฟร์ ของดีหนองวัวซอ",
		start: new Date(2023, 3, -2),
		end: new Date(2023, 3, -2),
		allDay: true,
		extendedProps: {
			calendar: "issan",
		},
	},
	{
		id: 22,
		url: "",
		title:
			"นิทรรศการ “วันคล้ายวันพระราชสมภพ สมเด็จพระกนิษฐาธิราชเจ้า กรมสมเด็จพระเทพรัตนราชสุดา ฯ สยามบรมราชกุมารี” พิพิธภัณฑ์เมืองนราธิวาส",
		start: new Date(2023, 3, -2),
		end: new Date(2023, 3, -2),
		allDay: true,
		extendedProps: {
			calendar: "southern",
		},
	},
	{
		id: 23,
		url: "",
		title:
			"สีสันตะวันออก สีสัน EEC Colorful ตำบลบางปลาสร้อย อำเภอเมืองชลบุรี จังหวัดชลบุรี",
		start: new Date(2023, 3, -1),
		end: new Date(2023, 3, -1),
		allDay: true,
		extendedProps: {
			calendar: "eastern",
		},
	},
	{
		id: 24,
		url: "",
		title:
			"เทศกาลโขนกรุงศรีปีที่ 4 (รามายณะนานาชาติ) นักงานการท่องเที่ยวและกีฬาจังหวัดพระนครศรีอยุธยา",
		start: new Date(2023, 3, -1),
		end: new Date(2023, 3, -1),
		allDay: true,
		extendedProps: {
			calendar: "central",
		},
	},
	{
		id: 25,
		url: "",
		title:
			"งานวัฒนธรรมสองฝั่งเจ้าพระยา มหาเจษฎาบดินทร์ ประจำปีงบประมาณ พ.ศ. 2566 ศาลากลางจังหวัดนนทบุรี",
		start: new Date(2023, 3, -1),
		end: new Date(2023, 3, -1),
		allDay: true,
		extendedProps: {
			calendar: "eastern",
		},
	},
	{
		id: 26,
		url: "",
		title:
			"กิจกรรมการเกี่ยวข้าว สืบสานประเพณีวัฒนธรรม พลิกนาร้าง เป็นนารักษ์ ปีที่ ๕ อำเภอนาทวี จังหวัดสงขลา",
		start: new Date(2023, 3, -6),
		end: new Date(2023, 3, -6),
		allDay: true,
		extendedProps: {
			calendar: "southern",
		},
	},
	{
		id: 27,
		url: "",
		title: "งานปอยขันโตก รวมใจไท-ยวน ศาลากลางจังหวัดราชบุรี",
		start: new Date(2023, 3, -6),
		end: new Date(2023, 3, -6),
		allDay: true,
		extendedProps: {
			calendar: "central",
		},
	},
	{
		id: 28,
		url: "",
		title:
			"งานแถลงข่าว การจัดงาน มหกรรมศิลปะนานาชาติ Thailand Biennale, Chiang Rai 2023",
		start: new Date(2023, 3, -6),
		end: new Date(2023, 3, -6),
		allDay: true,
		extendedProps: {
			calendar: "northern",
		},
	},
	{
		id: 29,
		url: "",
		title: "​มหกรรมวัฒนธรรม “เต๊อะเติ๋น เดิ่นโคราช” ",
		start: new Date(2023, 3, -7),
		end: new Date(2023, 3, -7),
		allDay: true,
		extendedProps: {
			calendar: "issan",
		},
	},
	{
		id: 30,
		url: "",
		title: "โครงการสายวัฒนธรรม รากราชสีมา “รถไฟจะไปโคราช” ",
		start: new Date(2023, 3, -14),
		end: new Date(2023, 3, -14),
		allDay: true,
		extendedProps: {
			calendar: "issan",
		},
	},
	{
		id: 31,
		url: "",
		title: "เทศกาลตามรอยอารยธรรมขอมโบราณปราสาทศิลา",
		start: new Date(2023, 3, -23),
		end: new Date(2023, 3, -23),
		allDay: true,
		extendedProps: {
			calendar: "eastern",
		},
	},
	{
		id: 32,
		url: "",
		title:
			"งานตลาดนัดภูมิปัญญาสภาวัฒนธรรมอำเภอเมืองเพชรบุรี “ยลศิลป์ ถิ่นอาหาร ย่านต้นม่วง” ",
		start: new Date(2023, 3, -21),
		end: new Date(2023, 3, -21),
		allDay: true,
		extendedProps: {
			calendar: "central",
		},
	},
	{
		id: 33,
		url: "",
		title: "งานประเพณีชักพระ-ทอดผ้าป่าและแข่งเรือยาวจังหวัดสุราษฎร์ธานี",
		start: new Date(2023, 8, -4),
		end: new Date(2023, 8, -4),
		allDay: true,
		extendedProps: {
			calendar: "southern",
		},
	},
	{
		id: 34,
		url: "",
		title: "งานระนองมหานครน้ำแร่",
		start: new Date(2023, 7, -3),
		end: new Date(2023, 7, -3),
		allDay: true,
		extendedProps: {
			calendar: "southern",
		},
	},
	{
		id: 35,
		url: "",
		title: "การแข่งขันกีฬาตกปลาสายบุรี จังหวัดปัตตานี ประจำปี 2566",
		start: new Date(2023, 8, -10),
		end: new Date(2023, 8, -10),
		allDay: true,
		extendedProps: {
			calendar: "southern",
		},
	},
	{
		id: 36,
		url: "",
		title:
			"กิจกรรม WALK RUN BIKE 9 แสงนำใจ ไทยทั้งชาติ เดิน - วิ่ง-ปั่น ป้องกันอัมพาต จ.อุบลราชธานี",
		start: new Date(2023, 8, -2),
		end: new Date(2023, 8, -2),
		allDay: true,
		extendedProps: {
			calendar: "eastern",
		},
	},
	{
		id: 37,
		url: "",
		title: "ประเพณีลอยกระทงเมืองพัทยา ประจำปี 2566",
		start: new Date(2023, 11, -4),
		end: new Date(2023, 11, -4),
		allDay: true,
		extendedProps: {
			calendar: "eastern",
		},
	},
	{
		id: 38,
		url: "",
		title: "งานจัดแสดง Nasatta Summer Flower Carnival 2023 จ.ราชบุรี",
		start: new Date(2023, 7, -25),
		end: new Date(2023, 7, -25),
		allDay: true,
		extendedProps: {
			calendar: "central",
		},
	},
	{
		id: 39,
		url: "",
		title: "HUAHIN BEACH LIFE 2023",
		start: new Date(2023, 7, -10),
		end: new Date(2023, 7, -10),
		allDay: true,
		extendedProps: {
			calendar: "southern",
		},
	},
	{
		id: 40,
		url: "",
		title:
			"งานหมากไม้รสหวาน สืบสานประเพณี นวัตวิถีโนสุวรรณ บุรีรัมย์ ประจำปี 2566",
		start: new Date(2023, 7, -10),
		end: new Date(2023, 7, -10),
		allDay: true,
		extendedProps: {
			calendar: "issan",
		},
	},
	{
		id: 41,
		url: "",
		title: "เทศกาลดูผีเสื้อปางสีดา",
		start: new Date(2023, 7, -1),
		end: new Date(2023, 7, -1),
		allDay: true,
		extendedProps: {
			calendar: "eastern",
		},
	},
	{
		id: 42,
		url: "",
		title: "Amazing Thai Taste Festival 2023",
		start: new Date(2023, 7, -2),
		end: new Date(2023, 7, -2),
		allDay: true,
		extendedProps: {
			calendar: "northern",
		},
	},
	{
		id: 43,
		url: "",
		title: "เทศกาลไทลื้อ “โฮ่มฮีต โตยฮอย ร้อยใจไทลื้อ” จ.พะเยา",
		start: new Date(2023, 7, -16),
		end: new Date(2023, 7, -16),
		allDay: true,
		extendedProps: {
			calendar: "northern",
		},
	},
	{
		id: 44,
		url: "",
		title: "งานพัทยามาราธอน 2023",
		start: new Date(2023, 7, -8),
		end: new Date(2023, 7, -8),
		allDay: true,
		extendedProps: {
			calendar: "eastern",
		},
	},
	{
		id: 45,
		url: "",
		title: "ประเพณีแห่เทียนเข้าพรรษา จังหวัดอุบลราชธานี",
		start: new Date(2023, 7, -2),
		end: new Date(2023, 7, -2),
		allDay: true,
		extendedProps: {
			calendar: "issan",
		},
	},
	{
		id: 46,
		url: "",
		title: "Ayutthaya Run Run : Fun With History 2023 จ.พระนครศรีอยุทธยา",
		start: new Date(2023, 7, -17),
		end: new Date(2023, 7, -17),
		allDay: true,
		extendedProps: {
			calendar: "central",
		},
	},
	{
		id: 47,
		url: "",
		title:
			"Infinity Ground – Thailand And Taiwan Contemporary Architecture Exhibition,Bankok",
		start: new Date(2023, 7, -13),
		end: new Date(2023, 7, -13),
		allDay: true,
		extendedProps: {
			calendar: "central",
		},
	},
];
