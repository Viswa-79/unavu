import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:smooth_page_indicator/smooth_page_indicator.dart';
import 'package:unavu/auth/login.dart';
import 'package:unavu/land2.dart';

class Landing1 extends StatefulWidget {
  const Landing1({super.key});

  @override
  State<Landing1> createState() => _Landing1State();
}

class _Landing1State extends State<Landing1> {
  final controller = PageController();
  @override
  void dispose() {
    controller.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Column(
        crossAxisAlignment: CrossAxisAlignment.center,
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          const SizedBox(
            height: 120,
          ),
          Center(
            child: SvgPicture.asset(
              "assets/svg/banner1.svg",
              height: 200,
              width: 100,
            ),
          ),
          const SizedBox(
            height: 30,
          ),
          const Center(
            child: Text(
              "All your favourites",
              style: TextStyle(
                  fontSize: 25,
                  fontFamily: "Merienda",
                  fontWeight: FontWeight.bold),
            ),
          ),
          const SizedBox(
            height: 30,
          ),
          const Center(
            child: Text(
              textAlign: TextAlign.center,
              "Get all your loved foods in one once place,\n"
              "you just place the orer we do the rest",
              style: TextStyle(fontSize: 16, fontFamily: "Mer-light"),
            ),
          ),
          const SizedBox(
            height: 60,
          ),
          Center(
            child: SmoothPageIndicator(
              controller: controller,
              count: 3,
              effect: const WormEffect(
                  dotHeight: 12,
                  dotWidth: 12,
                  spacing: 16,
                  dotColor: Color.fromARGB(255, 231, 223, 211),
                  activeDotColor: Colors.orange),
            ),
          ),
          const SizedBox(
            height: 100,
          ),
          Padding(
            padding: const EdgeInsets.only(right: 20.0, left: 20),
            child: Container(
              decoration: BoxDecoration(
                  color: Colors.orange,
                  borderRadius: BorderRadius.circular(10)),
              height: 60,
              width: double.infinity,
              child: TextButton(
                onPressed: () {
                  Navigator.push(
                    context,
                    MaterialPageRoute(builder: (context) => const Landing2()),
                  );
                },
                child: const Text(
                  "NEXT",
                  style: TextStyle(
                      fontSize: 20, color: Colors.white, fontFamily: "ibm"),
                ),
              ),
            ),
          ),
          const SizedBox(
            height: 10,
          ),
          Padding(
            padding: const EdgeInsets.only(right: 20.0, left: 20),
            child: Container(
              decoration: BoxDecoration(borderRadius: BorderRadius.circular(0)),
              height: 60,
              width: double.infinity,
              child: TextButton(
                onPressed: () {
                  Navigator.push(
                    context,
                    MaterialPageRoute(builder: (context) => const Login()),
                  );
                },
                child: const Text(
                  "SKIP",
                  style: TextStyle(
                      fontSize: 20,
                      color: Color.fromARGB(255, 149, 145, 145),
                      fontFamily: "ibm"),
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }
}
