import 'package:flutter/material.dart';

class HomePage extends StatefulWidget {
  const HomePage({super.key});

  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: SizedBox(
        height: 150,
        child: Padding(
          padding: const EdgeInsets.only(left: 10, right: 20),
          child: Row(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              IconButton(
                style: ButtonStyle(
                  backgroundColor: MaterialStateProperty.all(
                      Color.fromARGB(255, 238, 238, 239)),
                ),
                onPressed: () {},
                icon: const Icon(
                  Icons.menu_rounded,
                ),
              ),
              SizedBox(
                width: 20,
              ),
              const Text(
                'Home',
                style: TextStyle(fontSize: 20, color: Colors.black),
              ),
              IconButton(
                style: ButtonStyle(
                  backgroundColor:
                      MaterialStateProperty.all(Color.fromARGB(255, 0, 0, 0)),
                ),
                onPressed: () {},
                icon: const Icon(
                  Icons.shopping_cart_rounded,
                  color: Colors.white,
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
