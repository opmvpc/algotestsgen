package be.unamur.info.algo2;

import org.junit.Rule;
import org.junit.Test;
import org.junit.rules.TemporaryFolder;
import org.junit.rules.TestRule;
import org.junit.rules.TestWatcher;
import org.junit.runner.Description;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Paths;

import static org.hamcrest.MatcherAssert.assertThat;
import static org.junit.Assert.*;

public class Algo2Problem{{ $key }}Test {

    private static final Logger LOG = LoggerFactory.getLogger(Algo2Problem{{ $key }}Test.class);

    private String getFileText(String input) throws IOException {
        return new String(Files.readAllBytes(Paths.get(input)));
    }
    @Rule
    public TemporaryFolder testFolder = new TemporaryFolder(); // Create a temporary folder for outputs deleted after tests

    @Rule
    public TestRule watcher = new TestWatcher() { // Prints message on logger before each test
        @Override
        protected void starting(Description description) {
            LOG.info(String.format("Starting test: %s()...",
                    description.getMethodName()));
        }
    };

@foreach ($probleme as $test)

    /*
    | Test proposé par {{ $test->user->name }}
    */
    @Test
    public void test_problem-{{ $test->probleme->id }}-{{ $test->resultat != 'null' ? 'ok' : 'fail' }}-{{ Str::slug($test->nom) }}() throws Exception {

        String input = "src/test/resources/problem{{ $test->probleme->id }}/{{ $test->nom }}.txt";

        String[] result = Main.problem_{{ $test->probleme->id }}(getFileText(input));
        String[] s_result = {!! $test->resultat !!};

    @if ($test->resultat != 'null')
    assertArrayEquals(s_result, result);
@else
    assertNull(result);
@endif
    }

    /*
    | Test proposé par {{ $test->user->name }}
    */
    @Test
    public void test-problem-{{ $test->probleme->id }}-naive-{{ $test->resultat != 'null' ? 'ok' : 'fail' }}-{{ Str::slug($test->nom) }}() throws Exception {

        String input = "src/test/resources/problem{{ $test->probleme->id }}/{{ $test->nom }}.txt";

        String[] result = Main.problem_{{ $test->probleme->id }}(getFileText(input));
        String[] s_result = {!! $test->resultat !!};

    @if ($test->resultat != 'null')
    assertArrayEquals(s_result, result);
@else
    assertNull(result);
@endif
    }

@endforeach

}
